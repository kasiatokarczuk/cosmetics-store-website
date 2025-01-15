<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Advice;

class AdvicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Advice::create([
            'category' => 'makijaż',
            'title' => 'Makijaż Oczu: Jak Uzyskać Olśniewające Spojrzenie',
            'content' => 'Makijaż oczu to kluczowy element w codziennym makijażu, który może dodać wyrazistości i głębi spojrzeniu. Zacznij od aplikacji bazy pod cienie, która pomoże utrzymać makijaż przez cały dzień. Następnie wybierz neutralne cienie do powiek w odcieniach beżu, brązu lub złota, które pasują do każdego typu urody. Nałóż jasny cień na całą powiekę, a ciemniejszy w załamanie, aby nadać oczom głębię.

Zastosuj eyeliner wzdłuż linii rzęs, aby podkreślić kształt oczu – dla delikatniejszego efektu wybierz brązowy, a dla mocniejszego czarny. Na koniec, wytuszuj rzęsy, aby nadać im objętości i podkręcenia. Jeśli chcesz dodać jeszcze więcej wyrazistości, skorzystaj z sztucznych rzęs. Pamiętaj, aby na koniec delikatnie podkreślić brwi, co zwróci uwagę na oczy.',
            'image' => 'poradnik_1.jpg',
        ]);

        Advice::create([
            'category' => 'pielęgnacja',
            'title' => 'Jak zadbać o zdrowe i lśniące włosy?',
            'content' => 'Aby włosy były zdrowe i lśniące, kluczowa jest odpowiednia pielęgnacja. Regularne nawilżanie, unikanie nadmiernego ciepła oraz stosowanie naturalnych masek nawilżających to podstawy. Olejowanie włosów, szczególnie olejem arganowym czy kokosowym, pomaga przywrócić im blask i elastyczność, zapobiegając ich łamaniu. Warto także pamiętać o stosowaniu odpowiednich szamponów i odżywek, które odpowiadają na potrzeby naszego rodzaju włosów. Dla włosów suchych sprawdzą się preparaty intensywnie nawilżające, natomiast dla cienkich warto wybierać szampony dodające objętości. Regularne przycinanie końcówek pomoże utrzymać włosy w dobrej kondycji. Ograniczając stylizację na gorąco i dbając o ich nawilżenie, możemy cieszyć się zdrowymi i lśniącymi włosami na co dzień.',
            'image' => 'pielegnacja_wlosow.jpg',
        ]);

        Advice::create([
            'category' => 'makijaż',
            'title' => 'Jak podkreślić brwi? Rodzaje produktów i ich zastosowanie',
            'content' => 'Brwi mają ogromny wpływ na wyraz twarzy, dlatego warto zadbać o ich odpowiednie podkreślenie. Oto kilka produktów, które pomogą Ci uzyskać idealny efekt:

1.Kredka do brwi – Używana do precyzyjnego rysowania włosków i wypełniania luki. Wybierz kolor, który najlepiej pasuje do Twoich włosów.

2.Cień do brwi – Stosowany dla subtelnego efektu. Aplikowany pędzelkiem, świetnie wypełnia brwi, nadając im naturalny wygląd.

3.Pomada do brwi – Idealna dla osób z rzadkimi brwiami, zapewnia pełny i wyrazisty kształt.

4.Wosk do brwi – Utrwala włoski, nadając im pożądany kształt.

5.Żel do brwi – Ujarzmia niesforne włoski, zapewniając trwały efekt przez cały dzień.

Wybierz produkt odpowiedni do swoich potrzeb, pamiętając o dopasowaniu koloru do odcienia włosów.',
            'image' => 'makijaz_brwi.jpg',
        ]);

        Advice::create([
            'category' => 'pielęgnacja',
            'title' => 'Ochrona i nawilżenie skóry ciała w zimie',
            'content' => 'Zimą skóra ciała wymaga szczególnej troski, ponieważ mroźne powietrze i wiatr mogą ją przesuszać. Aby zachować jej odpowiednie nawilżenie, warto stosować tłuste kremy nawilżające oraz oleje, które tworzą ochronną barierę. Olej kokosowy, migdałowy czy masło shea doskonale wspierają skórę, zapewniając jej gładkość i elastyczność. Oprócz pielęgnacji zewnętrznej, nie zapominaj o nawilżaniu skóry od wewnątrz – pijąc odpowiednią ilość wody i jedząc zdrowe produkty bogate w witaminy, takie jak owoce, warzywa, orzechy i ryby. Takie połączenie działa na korzyść Twojej skóry, zapewniając jej ochronę przed zimowym chłodem. Regularne nawilżanie i dbanie o odpowiednią dietę to klucz do utrzymania zdrowej i promiennej skóry przez całą zimę.',
            'image' => 'pielegnacja_zima.jpg',
        ]);

        Advice::create([
            'category' => 'makijaż',
            'title' => 'Czym jest konturowanie twarzy?',
            'content' => 'Konturowanie twarzy to technika makijażowa, która pozwala optycznie zmieniać kształt twarzy, podkreślać jej atuty i tuszować drobne niedoskonałości. Za pomocą odpowiednich kosmetyków, takich jak bronzer, róż i rozświetlacz, można wyrzeźbić twarz, nadając jej bardziej wyrazisty wygląd.

1.Bronzer – Nakłada się go w miejscach, które naturalnie są nieco ciemniejsze, takich jak skronie, boki czoła, linia żuchwy czy okolice policzków. Pozwala to uzyskać efekt "zarysowanej" twarzy.
2.Róż – Nakłada się na kości policzkowe, by nadać twarzy świeżości i zdrowego wyglądu.
3.Rozświetlacz – Aplikowany na najwyższe punkty twarzy, takie jak kości policzkowe, łuk brwiowy i grzbiet nosa, nadaje skórze blasku i optycznie powiększa wybrane partie twarzy.
Konturowanie jest prostym sposobem na uzyskanie smukłej, promiennej i pełnej życia twarzy!',
            'image' => 'makijaz_konturowanie.jpeg',
        ]);

        Advice::create([
            'category' => 'pielęgnacja',
            'title' => 'Demakijaż krok po kroku. Jak wykonać go prawidłowo?',
            'content' => 'Demakijaż to kluczowy krok w codziennej pielęgnacji, który pozwala oczyścić skórę z resztek makijażu, zanieczyszczeń i nadmiaru sebum. Aby wykonać go prawidłowo, zacznij od demakijażu oczu – użyj specjalnego płynu micelarnego lub demakijażowego, który delikatnie usunie tusz do rzęs i cienie. Nasącz wacik i przyłóż go na chwilę do zamkniętych oczu, a następnie delikatnie przesuń w dół, by nie podrażnić wrażliwej skóry. Kolejnym krokiem jest oczyszczenie twarzy – użyj pianki, żelu lub mleczka do demakijażu, które pasuje do typu Twojej skóry. Na koniec przepłucz twarz letnią wodą i zastosuj tonik, aby przywrócić skórze odpowiednie pH. Pamiętaj, by nigdy nie zasypiać w makijażu, ponieważ może to prowadzić do podrażnień i przedwczesnego starzenia się skóry.',
            'image' => 'pielegnacja_demakijaz.jpg',
        ]);

        Advice::create([
            'category' => 'makijaż',
            'title' => 'Korektor do twarzy - jak dobrać odpowiedni?',
            'content' => 'Korektor to niezastąpiony produkt w makijażu, który pomaga zamaskować niedoskonałości skóry, takie jak cienie pod oczami, wypryski czy zaczerwienienia. Ważne jest, aby dobrać odpowiedni korektor, który spełni nasze potrzeby i pasuje do typu cery.

1.Korektor pod oczy – Wybieraj produkty o lekkiej konsystencji, najlepiej o odcieniu jaśniejszym niż skóra. Dzięki temu rozjaśnią one cienie i dodadzą twarzy świeżości.
2.Korektor do niedoskonałości – Wybierz korektor o średniej lub pełnej kryciu, w odcieniu zbliżonym do koloru skóry. Dobrze, by był wodoodporny, by utrzymał się przez cały dzień.
3.Korektor zielony – Świetnie maskuje zaczerwienienia i trądzik. Nałóż go punktowo przed aplikacją podkładu.
Wybierając korektor, zwróć uwagę na jego formułę, kolor oraz potrzeby swojej skóry, aby uzyskać naturalny, długotrwały efekt.',
            'image' => 'makijaz_korektor.jpg',
        ]);

        Advice::create([
            'category' => 'pielęgnacja',
            'title' => 'Pielęgnacja twarzy: Jak dbać o skórę codziennie?',
            'content' => 'Codzienna pielęgnacja twarzy to klucz do zdrowej, promiennej skóry. Zacznij od dokładnego oczyszczania, używając delikatnego żelu lub pianki dostosowanej do typu skóry. Pamiętaj, aby myć twarz rano i wieczorem, usuwając zanieczyszczenia i nadmiar sebum. Następnie zastosuj tonik, który przywróci skórze naturalne pH. Kolejnym krokiem jest nawilżenie – wybierz krem odpowiedni do Twojego typu skóry, aby utrzymać jej odpowiedni poziom nawilżenia. Warto także stosować serum, które pomoże w walce z konkretnymi problemami skórnymi, np. zmarszczkami czy przebarwieniami. Na dzień zawsze stosuj filtr przeciwsłoneczny, który chroni skórę przed szkodliwym działaniem promieni UV. Regularność i odpowiedni dobór produktów to podstawa skutecznej pielęgnacji twarzy.',
            'image' => 'pielegnacja_twarzy.jpg',
        ]);

        Advice::create([
            'category' => 'makijaż',
            'title' => 'Jak utrwalić makijaż? Sprawdź przydatne triki!',
            'content' => 'Aby makijaż utrzymał się przez cały dzień, warto poznać kilka sprawdzonych trików. Oto kilka z nich:

1.Baza pod makijaż – Stosowanie bazy pomoże wyrównać teksturę skóry i zapewni lepsze przyleganie podkładu. Wybierz bazę dostosowaną do typu skóry (np. matującą dla tłustej skóry).

2.Używaj pudru – Po aplikacji podkładu, delikatnie przypudruj twarz, szczególnie strefę T. Puder utrwali makijaż, zapobiegając ścieraniu i błyszczeniu się skóry.

3.Spray utrwalający – Na koniec użyj sprayu utrwalającego, który sprawi, że makijaż będzie trwały i odporny na warunki atmosferyczne.

4.Unikaj dotykania twarzy – Dotykanie skóry może powodować ścieranie się makijażu. Staraj się tego unikać przez cały dzień.

Te triki sprawią, że Twój makijaż pozostanie nienaruszony przez wiele godzin!',
            'image' => 'makijaz_utrwalenie.jpg',
        ]);

        Advice::create([
            'category' => 'pielęgnacja',
            'title' => 'Jak walczyć z wypadaniem włosów?',
            'content' => 'Wypadanie włosów to problem, który dotyczy wielu osób, ale istnieje kilka skutecznych metod, by sobie z nim poradzić. Przede wszystkim warto zadbać o zdrową dietę bogatą w witaminy i minerały, zwłaszcza biotynę, cynk, witaminę D i żelazo, które wspierają wzrost włosów. Regularne olejowanie włosów, np. olejem rycynowym, arganowym czy kokosowym, może poprawić kondycję cebulek i zapobiegać ich osłabieniu. Ważne jest także unikanie nadmiernego ciepła, jak prostowanie czy suszenie gorącym powietrzem, które osłabiają włosy. Stosowanie delikatnych szamponów oraz odżywek dostosowanych do potrzeb włosów pomoże w ich regeneracji. Jeśli problem wypadania włosów jest poważny, warto skonsultować się z dermatologiem lub trychologiem, aby znaleźć odpowiednią metodę leczenia.',
            'image' => 'pielegnacja_wlosow2.jpg',
        ]);

        Advice::create([
            'category' => 'makijaż',
            'title' => 'Jak podkreślić usta? ',
            'content' => 'Makijaż ust to kluczowy element, który może odmienić każdy look. Aby uzyskać perfekcyjny efekt, zacznij od nawilżenia ust – wybierz balsam nawilżający lub peeling, by przygotować usta do makijażu. Kolejnym krokiem jest konturowanie – za pomocą konturówki delikatnie zaznacz obrys ust, co nada im wyrazistości i poprawi trwałość pomadki. Jeśli chcesz powiększyć optycznie usta, skup się na ich środkowej części, nakładając jaśniejszy kolor. Następnie wybierz pomadkę – matową na wieczór lub błyszczyk na dzień. Jeśli zależy Ci na długotrwałym efekcie, zastosuj pomadkę w płynie lub szminkę o wysokiej trwałości. Na koniec, aby uniknąć rozmazywania się, delikatnie wklep puder transparentny wokół ust. Dzięki tym prostym krokom Twoje usta będą wyglądały kusząco przez cały dzień!',
            'image' => 'makijaz_usta.jpg',
        ]);

        Advice::create([
            'category' => 'pielęgnacja',
            'title' => 'Pielęgnacja twarzy: Jak pozbyć się niedoskonałości?',
            'content' => 'Niedoskonałości skóry to częsty problem, ale można je skutecznie zminimalizować poprzez odpowiednią pielęgnację. Kluczem jest codzienne oczyszczanie twarzy, aby pozbyć się zanieczyszczeń i nadmiaru sebum. Wybieraj łagodne środki oczyszczające, które nie wysuszają skóry. Następnie sięgnij po tonik, który pomoże przywrócić równowagę pH skóry. Do walki z niedoskonałościami warto stosować produkty z kwasem salicylowym lub niacynamidem, które regulują pracę gruczołów łojowych i zmniejszają zaczerwienienia. Nawilżanie jest równie ważne – wybierz lekki, nawilżający krem, który nie zatyka porów. Dodatkowo, raz lub dwa razy w tygodniu stosuj peeling, aby usunąć martwy naskórek i zapobiec zatykanianiu porów. Pamiętaj, że cierpliwość jest kluczowa – efekty przyjdą z czasem!',
            'image' => 'pielegnacja_twarzy2.jpg',
        ]);



    }


}
