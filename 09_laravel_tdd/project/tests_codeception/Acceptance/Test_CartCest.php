<?php

namespace Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class CartCest
{
    public function testCartFlow(AcceptanceTester $I): void
    {
        // Testowanie koszyka bez zalogowania
        $I->wantTo('Test the functionality of adding, managing, and clearing products in cart');
        $I->amOnPage('/');
        $I->seeInTitle('GlaMour');
        $I->click('#cart-icon');
        $I->waitForElementVisible('#loginModal', 5);
        $I->see('Aby sprawdzić koszyk, musisz się zalogować.', '#loginModal .modal-body');
        $I->seeElement('a.btn.btn-primary');
        $I->click('#loginModal .btn-primary');

        // Zalogowanie użytkownika
        $I->wantTo('Log in and verify redirection to the dashboard');
        $I->seeInCurrentUrl('/login');
        $I->logIn();
        $I->seeCurrentUrlEquals('/dashboard');
        $I->see('John Doe');

        // Przejście na podstronę
        $I->wantTo('Add products to the cart and verify notifications');
        $I->waitForNextPage(fn () => $I->click('PIELĘGNACJA'));
        $I->seeInCurrentUrl('/products/care');

        // Dodanie pierwszego produktu do koszyka
        $I->click('.grid .card:first-child .fa-shopping-cart');
        $I->waitForElementVisible('.swal2-popup', 5);
        $I->see('Produkt dodany do koszyka!', '.swal2-title');
        $I->click('#continue-shopping');
        $I->wait(1);

        // Dodaanie drugiego produktu do koszyka
        $I->click('.grid .card:nth-child(2) .fa-shopping-cart');
        $I->waitForElementVisible('.swal2-popup', 5);
        $I->see('Produkt dodany do koszyka!', '.swal2-title');
        $I->waitForNextPage(fn () => $I->click('Przejdź do koszyka'));

        // Przekierowanie do strony koszyka
        $I->wantTo('Verify products in the cart and test quantity and removal buttons');
        $I->seeInCurrentUrl('/cart');
        $I->see('Twój koszyk');
        $I->seeElement('table');

        // Sprawdzenie, czy produkty znajdują się w koszyku
        $I->seeElement('table tbody tr:nth-child(1) td');
        $I->seeElement('table tbody tr:nth-child(2) td');

        // Testowanie przycisków ilości (+/-)
        $I->submitForm('table tbody tr:nth-child(1) form[action*="increase"]', []);
        $I->wait(1);
        $I->see('2', 'table tbody tr:nth-child(1) td span');

        $I->submitForm('table tbody tr:nth-child(1) form[action*="increase"]', []);
        $I->wait(1);
        $I->see('3', 'table tbody tr:nth-child(1) td span');

        $I->submitForm('table tbody tr:nth-child(1) form[action*="decrease"]', []);
        $I->wait(1);
        $I->see('2', 'table tbody tr:nth-child(1) td span');

        // Usunięcie produktu z koszyka
        $I->submitForm('table tbody tr:nth-child(1) form[action*="remove"]', []);
        $I->see('Produkt usunięty z koszyka!');
        $I->wait(1);

        // Wyczyszczenie koszyka
        $I->wantTo('Empty the cart and verify the cart is cleared');
        $I->click('button[type="submit"][class="btn btn-warning w-100 mb-3"]');
        $I->wait(1);
        $I->see('Twój koszyk jest pusty.');
        $I->wait(1);

        // Przycisk "Kontynuuj zakupy"
        $I->click('a.btn.btn-outline-primary');
        $I->seeInCurrentUrl('/dashboard');
    }
}
