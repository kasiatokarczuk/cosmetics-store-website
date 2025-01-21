<?php

namespace Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class FavoriteCest
{
    public function testFavoriteFlow(AcceptanceTester $I): void
    {
        // Testowanie koszyka bez zalogowania
        $I->wantTo('Test the functionality of adding, managing, and clearing favorite products');
        $I->amOnPage('/');
        $I->seeInTitle('GlaMour');
        $I->click('#favorites-icon');
        $I->waitForElementVisible('#loginModalFavorites', 5);
        $I->see('Aby dodawać produkty do ulubionych, musisz się zalogować.', '#loginModalFavorites .modal-body');
        $I->seeElement('a.btn.btn-primary');
        $I->click('#loginModalFavorites .btn-primary');

        // Zalogowanie użytkownika
        $I->wantTo('Log in and verify redirection to the dashboard');
        $I->seeInCurrentUrl('/login');
        $I->logIn();
        $I->seeCurrentUrlEquals('/dashboard');
        $I->see('John Doe');

        // Przejście na podstronę
        $I->wantTo('Add products to the favorites and verify notifications');
        $I->waitForNextPage(fn () => $I->click('PIELĘGNACJA'));
        $I->seeInCurrentUrl('/products/care');

        // Dodanie pierwszego produktu do ulubionych
        $I->click('.grid .card:first-child .fa-heart');
        $I->waitForElementVisible('.swal2-popup', 5);
        $I->see('Produkt dodany do ulubionych!', '.swal2-title');
        $I->click('#continue-shopping');
        $I->wait(1);

        // Dodanie drugiego produktu do ulubionych
        $I->click('.grid .card:nth-child(2) .fa-heart');
        $I->waitForElementVisible('.swal2-popup', 5);
        $I->see('Produkt dodany do ulubionych!', '.swal2-title');
        $I->waitForNextPage(fn () => $I->click('Przejdź do ulubionych'));

        // Przekierowanie do strony ulubionych
        $I->wantTo('Verify products in the favorites and test buttons');
        $I->seeInCurrentUrl('/favorites');
        $I->see('Twoje ulubione produkty');

        // Sprawdzenie, czy produkty znajdują się w ulubionych
        $I->seeElement('.col-md-4:nth-child(1) .card');
        $I->seeElement('.col-md-4:nth-child(2) .card');

        // Sprawdzenie usuwania jednego produktu z ulubionych
        $I->wantTo('Remove a single product from the favorites');
        $I->click('.col-md-4:nth-child(1) .btn-danger');
        $I->waitForElementVisible('.alert-success', 5);
        $I->see('Produkt usunięty z ulubionych.', '.alert-success');

        // Sprawdzenie działania przycisku "Dodaj do koszyka"
        $I->wantTo('Verify the add to cart button works for a favorite product');
        $I->click('.col-md-4:nth-child(1) .add-to-cart button');
        $I->seeInCurrentUrl('/cart');
        $I->see('Produkt dodany do koszyka!');

        // Powrót do ulubionych
        $I->click('.header-icons a[title="Ulubione"]');
        $I->seeInCurrentUrl('/favorites');
        $I->see('Twoje ulubione produkty');

        // Sprawdzenie działania przycisku "Wyczyść ulubione"
        $I->wantTo('Verify the clear favorites button works');
        $I->click('button[type="submit"].btn-warning');
        $I->waitForElementVisible('.alert-success', 5);
        $I->see('Ulubione zostały wyczyszczone!', '.alert-success');
        $I->see('Nie masz żadnych ulubionych produktów.', '.alert-info');

        // Sprawdzenie działania przycisku "Kontynuuj zakupy"
        $I->wantTo('Verify the continue shopping button redirects to the dashboard');
        $I->click('.btn-outline-primary');
        $I->seeInCurrentUrl('/dashboard');

    }
}
