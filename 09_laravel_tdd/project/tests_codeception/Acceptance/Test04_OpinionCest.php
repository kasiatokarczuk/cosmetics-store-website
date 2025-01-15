<?php

namespace Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test04_OpinionCest
{
    public function testOpinionsForGuest(AcceptanceTester $I): void
    {
        $I->amOnPage('/');
        $I->moveMouseOver('#opinions-button');
        $I->seeElement('#opinions-container');
        $I->see('Świetne produkty!', '#opinion-1');
        $I->see('Szybka dostawa, wszystko ok, jestem zadowolony!', '#opinion-2');
        $I->dontSeeElement('#opinion-form');

    }

    public function testOpinionsForLoggedInUser(AcceptanceTester $I): void
    {
        $I->amOnPage('/dashboard');
        $I->logIn();
        $I->seeCurrentUrlEquals('/dashboard');
        $I->moveMouseOver('#opinions-button');
        $I->seeElement('#opinions-sidebar');
        $I->see('Świetne produkty!', '#opinion-1');
        $I->seeElement('#opinion-form');
        $I->fillField('#content', 'To jest nowa opinia!');
        $I->click('button[type="submit"]');
        $I->waitForElementVisible('#opinions-list li', 5);
        $I->see('To jest nowa opinia!', '#opinions-list li');
    }

}
