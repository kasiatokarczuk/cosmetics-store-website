<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test_ProductsCest
{
    public function testProductPageUpperSection(AcceptanceTester $I): void
    {
        $I->wantTo('check the appearance of the top section depending on your login');
        $I->amOnPage('/products');

        $I->seeInTitle('Lista Produktów');

        $I->seeLink('Zaloguj się', '/login');
        $I->seeLink('Zarejstruj się', '/register');


        $I->seeLink('GlaMour', '/');

        $I->waitForNextPage(fn () => $I->click('Zaloguj się'));
        $I->logIn();
        $I->seeCurrentUrlEquals('/dashboard');

        $I->waitForNextPage(fn () => $I->click('MAKIJAŻ'));

        $I->dontSee('Zaloguj się');
        $I->dontSee('Zarejstruj się');

        $I->seeElement('.profil');

        $I->seeLInk('NOWOŚCI', '/#nowosci');
        $I->see('PROMOCJE');
        $I->seeLink('MAKIJAŻ', '/products/makeup');
        $I->seeLink('PIELĘGNACJA', '/products/care');
        $I->seeLink('PORADNIKI', '/advices');

        $I->seeLink('GlaMour', '/dashboard');

        $I->see('Obecnie wyświetlanych produktów: ');
        $I->see('Zobacz wszystkie produkty', '.btn-all');
        $I->seeLink('Zobacz wszystkie produkty', '/products');
    }

    public function testALLProductsAreVisible(AcceptanceTester $I): void
    {
        $I->wantTo('visibility of products from each category on the product page');
        $I->amOnPage('/products');
        $I->seeElement('.grid');
        $I->seeElement('.card');
        $I->seeElement('.product-image');
        //$I->seeElement('.card-title');
        $I->seeElement('.card-price');

        $I->see('Produkty: Wszystkie produkty');
        //przykladowe produkty z kazdej podkategorii
        //oko
        $I->see('Paleta cieni do powiek w 4 odcieniach różu', '.card-title');
        //twarz
        $I->see('Paleta do konturowania twarzy', '.card-title');
        //usta
        $I->see('Zestaw dwóch błyszczyków', '.card-title');
        //cialo
        $I->see('Balsam do ciała', '.card-title');
        //wlosy
        $I->see('Odżywka do włosów w sprayu', '.card-title');
    }

    public function testOnlyMakeupCategoryProductsAreVisible(AcceptanceTester $I): void
    {
        $I->wantTo('visibility of products only from makeup category on the makeup product page');
        $I->amOnPage('/products/makeup');
        $I->seeElement('.grid');
        $I->seeElement('.card');
        $I->seeElement('.product-image');
        $I->seeElement('.card-price');

        $I->see('Produkty: Makijaż');
        //przykladowe produkty z kazdej podkategorii
        //oko
        $I->see('Paleta cieni do powiek w 4 odcieniach różu', '.card-title');
        //twarz
        $I->see('Paleta do konturowania twarzy', '.card-title');
        //usta
        $I->see('Zestaw dwóch błyszczyków', '.card-title');
        //cialo
        $I->dontSee('Balsam do ciała', '.card-title');
        //wlosy
        $I->dontSee('Odżywka do włosów w sprayu', '.card-title');
    }

    public function testOnlyCareCategoryProductsAreVisible(AcceptanceTester $I): void
    {
        $I->wantTo('visibility of products only from care category on the care product page');
        $I->amOnPage('/products/care');
        $I->seeElement('.grid');
        $I->seeElement('.card');
        $I->seeElement('.product-image');
        $I->seeElement('.card-price');

        $I->see('Produkty: Pielęgnacja');
        //przykladowe produkty z kazdej podkategorii
        //oko
        $I->dontSee('Paleta cieni do powiek w 4 odcieniach różu', '.card-title');
        //twarz
        $I->dontSee('Paleta do konturowania twarzy', '.card-title');
        //usta
        $I->dontSee('Zestaw dwóch błyszczyków', '.card-title');
        //cialo
        $I->see('Balsam do ciała', '.card-title');
        //wlosy
        $I->see('Odżywka do włosów w sprayu', '.card-title');
    }

    public function testOnlyEyeSubCategoryProductsAreVisible(AcceptanceTester $I): void
    {
        $I->wantTo('visibility of products only from eye subcategory on the eye product page');
        $I->amOnPage('/products/makeup/eye');
        $I->seeElement('.grid');
        $I->seeElement('.card');
        $I->seeElement('.product-image');
        $I->seeElement('.card-price');

        $I->see('Produkty: Oko');
        //przykladowe produkty z kazdej podkategorii
        //oko
        $I->see('Paleta cieni do powiek w 4 odcieniach różu', '.card-title');
        //twarz
        $I->dontSee('Paleta do konturowania twarzy', '.card-title');
        //usta
        $I->dontSee('Zestaw dwóch błyszczyków', '.card-title');
        //cialo
        $I->dontSee('Balsam do ciała', '.card-title');
        //wlosy
        $I->dontSee('Odżywka do włosów w sprayu', '.card-title');
    }

    public function testOnlyFaceSubCategoryProductsAreVisible(AcceptanceTester $I): void
    {
        $I->wantTo('visibility of products only from face subcategory on the face product page');
        $I->amOnPage('/products/makeup/face');
        $I->seeElement('.grid');
        $I->seeElement('.card');
        $I->seeElement('.product-image');
        $I->seeElement('.card-price');

        $I->see('Produkty: Twarz');
        //przykladowe produkty z kazdej podkategorii
        //oko
        $I->dontSee('Paleta cieni do powiek w 4 odcieniach różu', '.card-title');
        //twarz
        $I->see('Paleta do konturowania twarzy', '.card-title');
        //usta
        $I->dontSee('Zestaw dwóch błyszczyków', '.card-title');
        //cialo
        $I->dontSee('Balsam do ciała', '.card-title');
        //wlosy
        $I->dontSee('Odżywka do włosów w sprayu', '.card-title');
    }

    public function testOnlyMouthSubCategoryProductsAreVisible(AcceptanceTester $I): void
    {
        $I->wantTo('visibility of products only from mouth subcategory on the mouth product page');
        $I->amOnPage('/products/makeup/mouth');
        $I->seeElement('.grid');
        $I->seeElement('.card');
        $I->seeElement('.product-image');
        $I->seeElement('.card-price');

        $I->see('Produkty: Usta');
        //przykladowe produkty z kazdej podkategorii
        //oko
        $I->dontSee('Paleta cieni do powiek w 4 odcieniach różu', '.card-title');
        //twarz
        $I->dontSee('Paleta do konturowania twarzy', '.card-title');
        //usta
        $I->see('Zestaw dwóch błyszczyków', '.card-title');
        //cialo
        $I->dontSee('Balsam do ciała', '.card-title');
        //wlosy
        $I->dontSee('Odżywka do włosów w sprayu', '.card-title');
    }

    public function testOnlyBodySubCategoryProductsAreVisible(AcceptanceTester $I): void
    {
        $I->wantTo('visibility of products only from body subcategory on the body product page');
        $I->amOnPage('/products/care/body');
        $I->seeElement('.grid');
        $I->seeElement('.card');
        $I->seeElement('.product-image');
        $I->seeElement('.card-price');

        $I->see('Produkty: Ciało');
        //przykladowe produkty z kazdej podkategorii
        //oko
        $I->dontSee('Paleta cieni do powiek w 4 odcieniach różu', '.card-title');
        //twarz
        $I->dontSee('Paleta do konturowania twarzy', '.card-title');
        //usta
        $I->dontSee('Zestaw dwóch błyszczyków', '.card-title');
        //cialo
        $I->see('Balsam do ciała', '.card-title');
        //wlosy
        $I->dontSee('Odżywka do włosów w sprayu', '.card-title');
    }

    public function testOnlySubHairCategoryProductsAreVisible(AcceptanceTester $I): void
    {
        $I->wantTo('visibility of products only from hair subcategory on the hair product page');
        $I->amOnPage('/products/care/hair');
        $I->seeElement('.grid');
        $I->seeElement('.card');
        $I->seeElement('.product-image');
        $I->seeElement('.card-price');

        $I->see('Produkty: Włosy');
        //przykladowe produkty z kazdej podkategorii
        //oko
        $I->dontSee('Paleta cieni do powiek w 4 odcieniach różu', '.card-title');
        //twarz
        $I->dontSee('Paleta do konturowania twarzy', '.card-title');
        //usta
        $I->dontSee('Zestaw dwóch błyszczyków', '.card-title');
        //cialo
        $I->dontSee('Balsam do ciała', '.card-title');
        //wlosy
        $I->see('Odżywka do włosów w sprayu', '.card-title');
    }

    public function testPriceFilter(AcceptanceTester $I): void
    {
        $I->wantTo('correctness of product price filtering');

        //-------------------------------------------------------------------------------------------------------------
        $I->amOnPage('/products/care/hair');

        $I->see('Produkty: Włosy');
        $I->see('Odżywka do włosów w sprayu', '.card-title');
        $I->see('Zestaw do pielęgnacji włosów', '.card-title');

        //ustawione oba zakresy cenowe
        $I->fillField('min_price', '82');
        $I->fillField('max_price', '85');

        $I->waitForNextPage(fn () => $I->click('Zastosuj'));
        $I->see('Produkty: Włosy');

        //przykladowy produkt w tym zakresie cenowym
        $I->see('Zestaw dwóch szamponów do włosów', '.card-title');
        //przykladowe produkty poza zakresem cenowym
        $I->dontSee('Odżywka do włosów w sprayu', '.card-title'); //produk z kategorii wlosy
        $I->dontSee('Zestaw do pielęgnacji włosów', '.card-title'); //produk z kategorii wlosy

        $I->waitForNextPage(fn () => $I->click('Usuń filtry'));
        $I->seeCurrentUrlEquals('/products/care/hair');
        $I->see('Produkty: Włosy');
        //sprawdzenie widoczości produktów które nie były w przedziale cenowym
        $I->see('Odżywka do włosów w sprayu', '.card-title');
        $I->see('Zestaw do pielęgnacji włosów', '.card-title');

        //-------------------------------------------------------------------------------------------------------------
        $I->waitForNextPage(fn () => $I->click('Zobacz wszystkie produkty'));
        $I->seeCurrentUrlEquals('/products');
        $I->see('Produkty: Wszystkie produkty');

        $I->see('Zestaw do pielęgnacji włosów', '.card-title');
        $I->see('Premium róż', '.card-title');
        $I->see('Eyeliner', '.card-title');

        //ustawiony dolny zakres
        $I->fillField('min_price', '120');

        $I->waitForNextPage(fn () => $I->click('Zastosuj'));
        $I->see('Produkty: Wszystkie produkty');

        //przykladowy produkt w tym zakresie cenowym
        $I->see('Zestaw do pielęgnacji włosów', '.card-title');
        //przykladowe produkty poza zakresem cenowym
        $I->dontSee('Premium róż', '.card-title');
        $I->dontSee('Eyeliner', '.card-title');

        $I->waitForNextPage(fn () => $I->click('Usuń filtry'));
        $I->seeCurrentUrlEquals('/products');
        $I->see('Produkty: Wszystkie produkty');
        //sprawdzenie widoczości produktów które nie były w przedziale cenowym
        $I->see('Premium róż', '.card-title');
        $I->see('Eyeliner', '.card-title');

        //-------------------------------------------------------------------------------------------------------------
        $I->see('Zestaw do pielęgnacji włosów', '.card-title');

        //ustawiony gorny zakres
        $I->fillField('max_price', '20');

        $I->waitForNextPage(fn () => $I->click('Zastosuj'));
        $I->see('Produkty: Wszystkie produkty');

        //przykladowy produkt w tym zakresie cenowym
        $I->see('Eyeliner', '.card-title');
        //przykladowe produkty poza zakresem cenowym
        $I->dontSee('Premium róż', '.card-title');
        $I->dontSee('Zestaw do pielęgnacji włosów', '.card-title');

        $I->waitForNextPage(fn () => $I->click('Usuń filtry'));
        $I->seeCurrentUrlEquals('/products');
        $I->see('Produkty: Wszystkie produkty');
        //sprawdzenie widoczości produktów które nie były w przedziale cenowym
        $I->see('Premium róż', '.card-title');
        $I->see('Zestaw do pielęgnacji włosów', '.card-title');

        //-------------------------------------------------------------------------------------------------------------
        //ustawiony zakre w ktorym nie ma żadnyh produktów
        $I->fillField('min_price', '2');
        $I->fillField('max_price', '8');

        $I->waitForNextPage(fn () => $I->click('Zastosuj'));
        $I->see('Produkty: Wszystkie produkty');

        //przykladowy produkt w tym zakresie cenowym
        $I->see('Brak produktów w wybranym przedziale cenowym.');
        //przykladowe produkty poza zakresem cenowym
        $I->dontSeeElement('.card');

        $I->waitForNextPage(fn () => $I->click('Usuń filtry'));
        $I->seeCurrentUrlEquals('/products');
        $I->see('Produkty: Wszystkie produkty');
        //sprawdzenie widoczości produktów które nie były w przedziale cenowym
        $I->see('Premium róż', '.card-title');
        $I->see('Zestaw do pielęgnacji włosów', '.card-title');
    }

    public function testProductDetails(AcceptanceTester $I): void
    {
        $I->wantTo('see the details of prodct');
        $I->amOnPage('/products');

        $I->waitForNextPage(fn () => $I->click('Pokaż'));

        $I->see('Szczegóły produktu:');
        $I->see('Nazwa produktu:');
        $I->see('Cena:');
        $I->see('Kategoria nadrzędna:');
        $I->see('Kategoria podrzędna:');
        $I->see('Liczba sztuk:');
        $I->see('Opis:');

        $I->seeLink('Zobacz wszystkie produkty', '/products');
        $I->waitForNextPage(fn () => $I->click('Zobacz wszystkie produkty'));
        $I->seeCurrentUrlEquals('/products');
    }

    public function testOnlyAdminProductAccess(AcceptanceTester $I): void
    {
        $I->wantTo('see administrator access');
        $I->amOnPage('/products');
        $I->dontSeeLink('Dodaj produkt', '/products/create');

        $I->waitForNextPage(fn () => $I->click('Pokaż'));
        $I->dontSeeLink('Edytuj produkt', '/products/edit/{product}');
        $I->dontSee('USUŃ PRODUKT');

        $I->waitForNextPage(fn () => $I->click('Zobacz wszystkie produkty'));
        $I->waitForNextPage(fn () => $I->click('Zaloguj się'));

        $I->seeCurrentUrlEquals('/login');
        $I->fillField('email', 'admin@gmail.com');
        $I->fillField('password', 'admin');
        $I->waitForNextPage(fn () => $I->click('Log in'));
        $I->seeCurrentUrlEquals('/dashboard');
        $I->waitForNextPage(fn () => $I->click('MAKIJAŻ'));

        $I->seeLink('Dodaj produkt', '/products/create');

        $I->waitForNextPage(fn () => $I->click('Zobacz wszystkie produkty'));

        $productName = "Produkt testowy";
        $productPrice = "500.00";
        $productCategory = "Makijaż";
        $productSubCategory = "Twarz";
        $productQuantity = "10";
        $productDescription = "Opis produktu testowego";

        $I->dontSee($productName, '.card-title');

        $I->waitForNextPage(fn () => $I->click('Dodaj produkt'));
        $I->seeCurrentUrlEquals('/products/create');
        $I->see('Dodaj nowy produkt');

        //żadne pole nieuzupelnione
        $I->waitForNextPage(fn () => $I->click('Dodaj produkt'));
        $I->seeCurrentUrlEquals('/products/create');

        $I->see('The name field is required.');
        $I->see('The price field is required.');
        $I->see('The parent category field is required.');
        $I->see('The sub category field is required.');
        $I->see('The quantity field is required.');
        $I->see('The description field is required.');

        //wybranie pól
        $I->fillField('name', $productName);
        $I->fillField('price', $productPrice);
        $I->fillField('quantity', $productQuantity);
        $I->selectOption('parent_category', $productCategory);
        $I->selectOption('sub_category', $productSubCategory);
        $I->fillField('description', $productDescription);

        $I->dontSeeInDatabase('products', [
            'name' => $productName,
            'price' => $productPrice,
            'parent_category' => $productCategory,
            'sub_category' => $productSubCategory,
            'quantity' => $productQuantity,
            'description' => $productDescription,
        ]);

        $I->waitForNextPage(fn () => $I->click('Dodaj produkt'));
        $I->seeCurrentUrlEquals('/products/create');

        $I->see('Sukces! Produkt został dodany.');

        $I->seeInDatabase('products', [
            'name' => $productName,
            'price' => $productPrice,
            'parent_category' => $productCategory,
            'sub_category' => $productSubCategory,
            'quantity' => $productQuantity,
            'description' => $productDescription,
        ]);

        /** @var string $id */
        $id = $I->grabFromDatabase('products', 'id', [
            'name' => $productName
        ]);

        $I->waitForNextPage(fn () => $I->click('Zobacz wszystkie produkty'));
        $I->see($productName, '.card-title');
        $I->see('Brak zdjęcia');

        $I->waitForNextPage(fn () => $I->click('Pokaż'));

        $I->seeCurrentUrlEquals('/products/' . $id);
        $I->see('Szczegóły produktu:');
        $I->see('Nazwa produktu:');
        $I->see($productName);
        $I->see('Cena:');
        $I->see($productPrice);
        $I->see('Kategoria nadrzędna:');
        $I->see($productCategory);
        $I->see('Kategoria podrzędna:');
        $I->see($productSubCategory);
        $I->see('Liczba sztuk:');
        $I->see($productQuantity);
        $I->see('Opis:');
        $I->see($productDescription);

        $I->seeLink('Edytuj produkt', '/products/edit/' . $id);
        $I->see('USUŃ PRODUKT');

        $I->waitForNextPage(fn () => $I->click('Edytuj produkt'));
        $I->seeCurrentUrlEquals('/products/edit/' . $id);

        $I->see('Edytuj produkt:');
        $I->canSeeInField('name', $productName);
        $I->canSeeInField('price', $productPrice);
        $I->canSeeInField('quantity', $productQuantity);
        $I->canSeeInField('parent_category', $productCategory);
        $I->canSeeInField('sub_category', $productSubCategory);
        $I->canSeeInField('description', $productDescription);

        $I->clearField('name');
        $productNameEdited = "Produkt po edycji";
        $I->fillField('name', $productNameEdited);

        $I->waitForNextPage(fn () => $I->click('Zaktualizuj produkt'));
        $I->seeCurrentUrlEquals('/products/' . $id);

        $I->see('Nazwa produktu:');
        $I->see($productNameEdited);

        $I->waitForNextPage(fn () => $I->click('Zobacz wszystkie produkty'));
        $I->seeCurrentUrlEquals('/products');
        $I->see($productNameEdited, '.card-title');
        $I->dontSee($productName, '.card-title');

        $I->dontSeeInDatabase('products', [
            'id' => $id,
            'name' => $productName
        ]);

        $I->seeInDatabase('products', [
            'id' => $id,
            'name' => $productNameEdited
        ]);

        $I->waitForNextPage(fn () => $I->click('Pokaż'));
        $I->seeCurrentUrlEquals('/products/' . $id);
        $I->waitForNextPage(fn () => $I->click('Usuń produkt'));
        $I->seeCurrentUrlEquals('/products');
        $I->dontSee($productNameEdited, '.card-title');
        $I->dontSeeInDatabase('products', [
            'id' => $id,
            'name' => $productNameEdited
        ]);
    }
}
