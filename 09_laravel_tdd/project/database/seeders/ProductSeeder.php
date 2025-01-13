<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Paleta cieni do powiek w 4 odcieniach różu',
            'price' => 39.00,
            'parent_category' => 'Makijaż',
            'sub_category' => 'Oko',
            'quantity' => 55,
            'image' => '1.png',
            'description' => 'Ta paleta to idealny wybór dla miłośniczek subtelnych i romantycznych makijaży. Cztery harmonijnie dobrane odcienie różu pozwalają stworzyć zarówno delikatne, dzienne stylizacje, jak i bardziej wyraziste makijaże wieczorowe. Cienie są łatwe w aplikacji, trwałe i mają aksamitną konsystencję, która doskonale się blenduje.',
        ]);

        Product::create([
            'name' => 'Paleta do konturowania twarzy',
            'price' => 80.00,
            'parent_category' => 'Makijaż',
            'sub_category' => 'Twarz',
            'quantity' => 60,
            'image' => '2.png',
            'description' => 'Kompaktowa paleta, która pozwala kompleksowo wymodelować rysy twarzy. Zawiera róż dodający świeżości, bronzer do podkreślenia konturów, rozświetlacz nadający blasku oraz puder, który zapewnia idealne wykończenie makijażu. Doskonała do codziennego użytku i podróży dzięki praktycznemu opakowaniu.',
        ]);

        Product::create([
            'name' => 'Paleta do konturowania twarzy',
            'price' => 60.00,
            'parent_category' => 'Makijaż',
            'sub_category' => 'Twarz',
            'quantity' => 50,
            'image' => '3.png',
            'description' => 'Wszechstronna paleta dla każdej kobiety, która pragnie podkreślić naturalne piękno swojej twarzy. Bronzer idealnie nadaje głębi, róż dodaje zdrowego kolorytu, a rozświetlacz zapewnia subtelny blask. Dzięki jedwabistej konsystencji produkty świetnie się rozprowadzają i łączą ze sobą.',
        ]);

        Product::create([
            'name' => 'Paleta cieni do oczu',
            'price' => 89.00,
            'parent_category' => 'Makijaż',
            'sub_category' => 'Oko',
            'quantity' => 30,
            'image' => '4.png',
            'description' => 'Ta paleta to prawdziwy must-have dla fanek makijażu! Zawiera aż 16 różnorodnych odcieni – od delikatnych nude, przez intensywne brązy, aż po odważne kolory. Cienie są wysoce napigmentowane, długotrwałe i łatwe do blendowania, co pozwala stworzyć niezliczoną ilość stylizacji, od codziennych po wieczorowe.',
        ]);

        Product::create([
            'name' => 'Zestaw dwóch błyszczyków',
            'price' => 68.00,
            'parent_category' => 'Makijaż',
            'sub_category' => 'Usta',
            'quantity' => 40,
            'image' => '5.png',
            'description' => 'Ten zestaw to idealne połączenie dla każdej kobiety. Błyszczyk z drobinkami dodaje ustom efektownego blasku, doskonałego na wieczór, a błyszczyk bez drobinek zapewnia subtelne i eleganckie wykończenie, idealne na co dzień. Oba produkty mają lekką, nieklejącą formułę, która nawilża usta.',
        ]);

        Product::create([
            'name' => 'Błyszczyk z drobinkami',
            'price' => 29.00,
            'parent_category' => 'Makijaż',
            'sub_category' => 'Usta',
            'quantity' => 50,
            'image' => '6.png',
            'description' => 'Nadaj swoim ustom wyjątkowego blasku dzięki błyszczykowi z połyskującymi drobinkami. Jego lekka i przyjemna formuła nie klei się i zapewnia długotrwałe nawilżenie. Drobinki pięknie odbijają światło, sprawiając, że usta wyglądają pełniej i bardziej zmysłowo.',
        ]);

        Product::create([
            'name' => 'Szminka',
            'price' => 69.00,
            'parent_category' => 'Makijaż',
            'sub_category' => 'Usta',
            'quantity' => 50,
            'image' => '7.png',
            'description' => 'Szminka w odcieniu różu, która podkreśli piękno Twoich ust. Doskonała na co dzień – jej kremowa formuła łatwo się aplikuje i nie wysusza ust, pozostawiając je miękkie i nawilżone. Subtelny kolor pasuje do każdej okazji.',
        ]);

        Product::create([
            'name' => 'Szminka',
            'price' => 69.00,
            'parent_category' => 'Makijaż',
            'sub_category' => 'Usta',
            'quantity' => 45,
            'image' => '8.png',
            'description' => 'Wyrazisty odcień różu, który doskonale podkreśli Twój makijaż. Ta szminka łączy intensywny kolor z komfortem noszenia – nie wysusza ust i zapewnia aksamitne wykończenie. Świetna opcja na wieczór lub na momenty, kiedy chcesz wyróżnić się z tłumu.',
        ]);

        Product::create([
            'name' => 'Kredka do konturowania ust',
            'price' => 19.00,
            'parent_category' => 'Makijaż',
            'sub_category' => 'Usta',
            'quantity' => 60,
            'image' => '9.png',
            'description' => 'Precyzyjna kredka, która pozwala idealnie podkreślić kontur ust i przedłużyć trwałość szminki. Miękka formuła zapewnia łatwą aplikację, a różowy odcień świetnie komponuje się z różnymi kolorami szminek. Nieodzowny element każdej kosmetyczki! ',
        ]);

        Product::create([
            'name' => 'Puder w kremie',
            'price' => 60.00,
            'parent_category' => 'Makijaż',
            'sub_category' => 'Twarz',
            'quantity' => 30,
            'image' => '10.png',
            'description' => 'Innowacyjna formuła łącząca zalety kremu i pudru. Produkt równomiernie rozprowadza się na skórze, wyrównuje jej koloryt i nadaje matowe wykończenie. Idealny dla osób ceniących naturalny wygląd i długotrwały efekt.',
        ]);

        Product::create([
            'name' => 'Zestaw korektor do twarzy + fluid',
            'price' => 110.00,
            'parent_category' => 'Makijaż',
            'sub_category' => 'Twarz',
            'quantity' => 36,
            'image' => '11.png',
            'description' => 'Komplet, który zapewnia perfekcyjny wygląd cery przez cały dzień. Korektor maskuje niedoskonałości, a fluid wyrównuje koloryt skóry i nadaje jej zdrowy wygląd. Idealny duet do codziennego makijażu.',
        ]);

        Product::create([
            'name' => 'Zestaw dwóch korektorów',
            'price' => 90.00,
            'parent_category' => 'Makijaż',
            'sub_category' => 'Twarz',
            'quantity' => 47,
            'image' => '12.png',
            'description' => 'Podwójna siła krycia! Korektor w sztyfcie idealnie tuszuje większe niedoskonałości, natomiast korektor w płynie delikatnie rozświetla okolicę oczu, zapewniając świeży wygląd. ',
        ]);

        Product::create([
            'name' => 'Fluid',
            'price' => 60.00,
            'parent_category' => 'Makijaż',
            'sub_category' => 'Twarz',
            'quantity' => 52,
            'image' => '13.png',
            'description' => 'Jedwabisty podkład, który idealnie stapia się ze skórą. Zapewnia średnie do pełnego krycia, a jednocześnie pozwala cerze oddychać. Produkt doskonały zarówno na codzień, jak i na większe wyjścia. ',
        ]);

        Product::create([
            'name' => 'Zestaw dwóch fluidów',
            'price' => 100.00,
            'parent_category' => 'Makijaż',
            'sub_category' => 'Twarz',
            'quantity' => 39,
            'image' => '14.png',
            'description' => 'Zestaw stworzony z myślą o precyzyjnym konturowaniu twarzy. Ciemniejszy fluid nadaje głębię i podkreśla rysy, podczas gdy jaśniejszy rozświetla skórę pod oczami, dając efekt wypoczętego spojrzenia. ',
        ]);

        Product::create([
            'name' => 'Fluid',
            'price' => 58.00,
            'parent_category' => 'Makijaż',
            'sub_category' => 'Twarz',
            'quantity' => 35,
            'image' => '15.png',
            'description' => ' ',
        ]);

        Product::create([
            'name' => 'Odżywka do włosów',
            'price' => 60.00,
            'parent_category' => 'Pielęgnacja',
            'sub_category' => 'Włosy',
            'quantity' => 34,
            'image' => '16.png',
            'description' => 'Regenerująca odżywka, która głęboko nawilża włosy, nadając im jedwabistą gładkość i zdrowy połysk. Idealna do codziennego stosowania, aby włosy były łatwe w rozczesywaniu i odporne na uszkodzenia ',
        ]);

        Product::create([
            'name' => 'Odżywka do włosów w sprayu',
            'price' => 30.00,
            'parent_category' => 'Pielęgnacja',
            'sub_category' => 'Włosy',
            'quantity' => 49,
            'image' => '17.png',
            'description' => 'Lekka formuła w sprayu, która działa błyskawicznie. Nawilża, chroni i dodaje blasku włosom bez obciążania ich. Idealne rozwiązanie dla osób w biegu. ',
        ]);

        Product::create([
            'name' => 'Zestaw dwóch odżywek w sprayu do włosów',
            'price' => 50.00,
            'parent_category' => 'Pielęgnacja',
            'sub_category' => 'Włosy',
            'quantity' => 52,
            'image' => '18.png',
            'description' => 'Zestaw zapewniający kompleksową pielęgnację włosów. Dwie formuły – jedna do codziennego nawilżania, druga dla intensywnej regeneracji. Doskonałe dla każdego rodzaju włosów. ',
        ]);

        Product::create([
            'name' => 'Balsam do ciała',
            'price' => 70.00,
            'parent_category' => 'Pielęgnacja',
            'sub_category' => 'Ciało',
            'quantity' => 39,
            'image' => '19.png', //lub 21.png
            'description' => 'Intensywnie nawilżający balsam, który otula skórę delikatnym zapachem i pozostawia ją gładką przez cały dzień. Idealny do codziennego stosowania, aby zadbać o zdrowy wygląd skóry. ',
        ]);

        Product::create([
            'name' => 'Zestaw trzech produktów do pielęgnacji ciała',
            'price' => 140.00,
            'parent_category' => 'Pielęgnacja',
            'sub_category' => 'Ciało',
            'quantity' => 29,
            'image' => '20.png',
            'description' => 'Trzy wyjątkowe formuły, które zapewnią skórze kompleksową pielęgnację i odżywienie. ',
        ]);

        Product::create([
            'name' => 'Krem do twarzy na dzień',
            'price' => 59.00,
            'parent_category' => 'Pielęgnacja',
            'sub_category' => 'Ciało',
            'quantity' => 46,
            'image' => '22.png',
            'description' => '',
        ]);

        Product::create([
            'name' => 'Krem do twarzy na noc',
            'price' => 59.00,
            'parent_category' => 'Pielęgnacja',
            'sub_category' => 'Ciało',
            'quantity' => 42,
            'image' => '23.png',
            'description' => 'Odżywcza formuła stworzona, aby regenerować skórę podczas snu. Dzięki bogatym składnikom aktywnym, krem poprawia elastyczność skóry i przywraca jej zdrowy blask. Obudź się z promienną cerą!',
        ]);

        Product::create([
            'name' => 'Zestaw dwóch kremów do rąk',
            'price' => 39.00,
            'parent_category' => 'Pielęgnacja',
            'sub_category' => 'Ciało',
            'quantity' => 22,
            'image' => '24.png',
            'description' => 'Podwójna ochrona i nawilżenie dla Twoich dłoni – zawsze pod ręką.',
        ]);

        Product::create([
            'name' => 'Pianka do włosów',
            'price' => 28.00,
            'parent_category' => 'Pielęgnacja',
            'sub_category' => 'Włosy',
            'quantity' => 17,
            'image' => '25.png',
            'description' => 'Nadaj fryzurze objętości i utrwalenia dzięki lekkiej, pielęgnującej piance.',
        ]);

        Product::create([
            'name' => 'Krem do rąk',
            'price' => 22.00,
            'parent_category' => 'Pielęgnacja',
            'sub_category' => 'Ciało',
            'quantity' => 35,
            'image' => '26.png',
            'description' => 'Nawilżenie i ochrona dłoni w jednej tubce. Idealny do codziennego użytku.',
        ]);

        Product::create([
            'name' => 'Zestaw dwóch szamponów do włosów',
            'price' => 84.00,
            'parent_category' => 'Pielęgnacja',
            'sub_category' => 'Włosy',
            'quantity' => 31,
            'image' => '27.png',
            'description' => 'Kompleksowa pielęgnacja włosów – szampony dostosowane do różnych potrzeb.',
        ]);

        Product::create([
            'name' => 'Szampon do włosów',
            'price' => 49.00,
            'parent_category' => 'Pielęgnacja',
            'sub_category' => 'Włosy',
            'quantity' => 43,
            'image' => '28.png',
            'description' => 'Delikatna formuła, która oczyszcza i odżywia włosy, nadając im zdrowy wygląd.',
        ]);

        Product::create([
            'name' => 'Zestaw do pielęgnacji włosów',
            'price' => 149.00,
            'parent_category' => 'Pielęgnacja',
            'sub_category' => 'Włosy',
            'quantity' => 19,
            'image' => '29.png',
            'description' => 'Kompleksowy zestaw dla zdrowych, lśniących włosów. Wszystko, czego potrzebujesz w jednym pakiecie.',
        ]);

        Product::create([
            'name' => 'Eyeliner',
            'price' => 19.00,
            'parent_category' => 'Makijaż',
            'sub_category' => 'Oko',
            'quantity' => 52,
            'image' => '30.png', //lub 31.png
            'description' => 'Intensywnie czarny eyeliner z precyzyjnym aplikatorem, który pozwala wykonać perfekcyjną kreskę. Długotrwała formuła zapewnia efekt idealnego makijażu przez cały dzień, bez rozmazywania. ',
        ]);

        Product::create([
            'name' => 'Premium róż',
            'price' => 99.00,
            'parent_category' => 'Makijaż',
            'sub_category' => 'Twarz',
            'quantity' => 20,
            'image' => 'zdj2.webp',
            'description' => 'Luksusowy róż o jedwabistej konsystencji. Nadaje cerze zdrowy blask i świeżość',
        ]);
    }

}
