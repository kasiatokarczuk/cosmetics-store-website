<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test_AdvicesCest
{
    public function testAsGuestOrLoggedUser(AcceptanceTester $I): void
    {
        $I->wantTo('see advice entries as guest or logged user');
        $I->amOnPage('/advices');

        $I->seeLink('NOWOŚCI', '/#nowosci');
        $I->seeLink('PROMOCJE', '/#winter-sale');
        $I->seeLink('MAKIJAŻ', '/products/makeup');
        $I->seeLink('PIELĘGNACJA', '/products/care');
        $I->seeLink('PORADNIKI', '/advices');

        $I->see('PORADNIKI', 'h2');
        $I->dontSee('There is no advice in the database.');
        $I->dontSee('Utwórz nowy poradnik');
        $I->waitForNextPage(fn () => $I->click('Czytaj więcej'));
        $I->see('Szczegóły poradnika', 'h2');
        $I->seeCurrentUrlEquals('/advices/1');
        $I->dontSee('Edytuj', 'a');
        $I->dontSee('Usuń', 'button');
        $I->seeLink('Zaloguj się', '/login');
        $I->seeLink('Zarejestruj się', '/register');
        $I->seeLink('GlaMour', '/');

        $I->waitForNextPage(fn () => $I->click('Zaloguj się'));
        $I->logIn();
        $I->seeCurrentUrlEquals('/dashboard');
        $I->waitForNextPage(fn () => $I->click('PORADNIKI'));
        $I->dontSee('Zaloguj się');
        $I->dontSee('Zarejstruj się');
        $I->seeElement('.profil');
        $I->seeLink('GlaMour', '/dashboard');
        $I->dontSeeLink('Utwórz nowy poradnik', '/advices');
        $I->waitForNextPage(fn () => $I->click('Czytaj więcej'));
        $I->dontSee('Edytuj', 'a');
        $I->dontSee('Usuń', 'button');

    }

    public function testSortAdvicesByCategory(AcceptanceTester $I): void
    {
        $I->wantTo('see if sorting advices by category works');
        $I->amOnPage('/advices');


        $I->see('makijaż', '.card-content p');
        $I->see('pielęgnacja', '.card-content p');


        $I->selectOption('category', 'makijaż');
        $I->waitForElementVisible('.card-content');
        $I->click('Sortuj');
        $I->seeInCurrentUrl('/advices?category=makija%C5%BC');


        $I->see('makijaż', '.card-content p');
        $I->dontSee('pielęgnacja', '.card-content p');


        $I->selectOption('category', 'pielęgnacja');
        $I->waitForElementVisible('.card-content');
        $I->click('Sortuj');
        $I->seeInCurrentUrl('/advices?category=piel%C4%99gnacja');

        $I->see('pielęgnacja', '.card-content p');
        $I->dontSee('makijaż', '.card-content p');


        $I->selectOption('category', '');
        $I->waitForElementVisible('.card-content');
        $I->click('Sortuj');
        $I->seeInCurrentUrl('/advices');

        $I->see('makijaż', '.card-content p');
        $I->see('pielęgnacja', '.card-content p');
    }
    public function testAsAdmin(AcceptanceTester $I): void
    {
        $I->wantTo('manage advice entries as admin');
        $I->amOnPage('/advices');

        //logowanie
        $I->waitForNextPage(fn () => $I->click('Zaloguj się'));
        $I->seeCurrentUrlEquals('/login');
        $I->fillField('email', 'admin@gmail.com');
        $I->fillField('password', 'admin');
        $I->waitForNextPage(fn () => $I->click('Log in'));
        $I->seeCurrentUrlEquals('/dashboard');

        //tworzenie poradnika
        $I->waitForNextPage(fn () => $I->click('PORADNIKI'));
        $I->see('Utwórz nowy poradnik');
        $I->waitForNextPage(fn () => $I->click('Utwórz nowy poradnik'));
        $I->seeCurrentUrlEquals('/advices/create');
        $I->see('Dodaj nowy poradnik', 'h2');

        //zle wypelniony formularz
        $adviceTitle = "Poradnik makijażowy";
        $adviceContent = "opis";
        $adviceCategory = "makijaż";
        $I->fillField('title', $adviceTitle);
        $I->selectOption('category', $adviceCategory);
        $I->fillField('content', $adviceContent);

        $I->dontSeeInDatabase('advice', [
            'title' => $adviceTitle,
            'category' => $adviceCategory,
            'content' => $adviceContent,
        ]);

        $I->waitForNextPage(fn () => $I->click('Dodaj poradnik'));
        $I->seeCurrentUrlEquals('/advices/create');


        $I->seeInDatabase('advice', [
            'title' => $adviceTitle,
            'category' => $adviceCategory,
            'content' => $adviceContent,
        ]);

        /** @var string $id */
        // Pobierz ID poradnika
        $id = $I->grabFromDatabase('advice', 'id', [
            'title' => $adviceTitle,
        ]);

        $I->waitForNextPage(fn () => $I->click('Zobacz wszystkie poradniki'));
        $I->seeCurrentUrlEquals('/advices');

        // Sprawdź szczegóły poradnika
        $I->see($adviceTitle, '.card-content');
        $I->see('Brak zdjęcia');

        $I->waitForNextPage(fn () => $I->click(['css' => 'a[data-id="' . $id . '"]']));
        $I->seeCurrentUrlEquals('/advices/' . $id);

        $I->see('Szczegóły poradnika');
        $I->see($adviceTitle);
        $I->see($adviceCategory);
        $I->see($adviceContent);
        $I->See('Edytuj', 'a');
        $I->See('Usuń', 'button');

        //edytowanie
        $I->waitForNextPage(fn () => $I->click('Edytuj'));
        $I->seeCurrentUrlEquals('/advices/' . $id . '/edit');
        $I->seeInField('title', $adviceTitle);
        $I->seeInField('category', $adviceCategory);
        $I->seeInField('content', $adviceContent);


        // edytowanie zawartości
        $I->clearField('title');
        $newTitle = "Nowy tytuł poradnika";
        $I->fillField('title', $newTitle);
        $I->waitForNextPage(fn () => $I->click('Zapisz zmiany'));
        $I->seeCurrentUrlEquals('/advices/' . $id);
        $I->dontSee($adviceTitle);
        $I->see($newTitle);

        // usuwanie poradnika
        $I->click('Usuń');
        $I->seeInPopup('Jesteś pewny, że chcesz usunąć ten poradnik?');
        $I->acceptPopup();
        $I->seeCurrentUrlEquals('/advices');
        $I->dontSeeInDatabase('advice', [
            'id' => $id,
            'title' => $newTitle,
        ]);
    }
}
