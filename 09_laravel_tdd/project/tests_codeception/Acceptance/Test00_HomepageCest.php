<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test00_HomepageCest
{
    public function test(AcceptanceTester $I): void
    {
        $I->wantTo('see main links on the GlaMour homepage');

        $I->amOnPage('/');

        $I->seeInTitle('GlaMour');

        $I->seeLink('Zaloguj się', '/login');
        $I->seeLink('Zarejestruj się', '/register');

        $I->seeElement('a#cart-icon');

        $I->see('NOWOŚCI');
        $I->see('PROMOCJE');
        $I->seeLink('MAKIJAŻ', '/products/makeup');
        $I->seeLink('PIELĘGNACJA', '/products/care');
        $I->seeLink('PORADNIKI', '/advices');

        $I->seeElement('#opinions-sidebar');
        $I->see('Opinie', '#opinions-button');

        $I->seeElement('img', ['src' => '/images_glowna/glowna1.png']);

        $I->scrollTo('#nowosci');
        $I->wait(1); // Odczekanie na renderowanie
        $I->see('NOWOŚCI', 'h1.products-header');
        $I->seeElement('.products-container');

        $I->scrollTo('#winter-sale');
        $I->see('WINTER SALE -20%');
        $I->seeElement('.products-container');

        $I->scrollTo('.newsletter-section');
        $I->see('Zapisz się do naszego newslettera', '.newsletter-section');
        $I->seeElement('#newsletter-form');
        $I->see('Odbierz 5% zniżki!', '.discount-text');

        $I->see('Kontakt | Płatności | Polityka prywatności');
        $I->see('© 2025 GlaMour. Wszelkie prawa zastrzeżone.');


    }
}
