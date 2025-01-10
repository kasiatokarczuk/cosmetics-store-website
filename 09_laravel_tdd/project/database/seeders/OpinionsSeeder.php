<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Import klasy DB

class OpinionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('opinions')->insert([
            ['user_id' => 1, 'content' => 'Świetne produkty!'],
            ['user_id' => 2, 'content' => 'Szybka dostawa, wszystko ok, jestem zadowolony!'],
            ['user_id' => 3, 'content' => 'Dawno nie byłam tak bardzo zadowolona z obsługi, brawo. Szybko i terminowo. Szacunek.'],
        ['user_id' => 4, 'content' => 'Szybka reakcja na zmianę danych i bez problemu. Mega ładnie zapakowany produkt. Serdecznie polecam obsługę sklepu, której nic nie można zarzucić.'],
            ['user_id' => 5, 'content' => 'Wow, nie sądziłam, że informacje na stronie będą tak dokładne i szczegółowe. Mega dobrze zabezpieczona paczka.'],
            ['user_id' => 6, 'content' => 'Dziękuję za sprawną obsługę. Polecam 😊'],
            ['user_id' => 7, 'content' => 'Paczka dotarła do mnie bezpiecznie w estetycznym pudełku.'],
            ['user_id' => 8, 'content' => 'Dostawa w mgnieniu oka. Rewelacyjna obsługa, reszta może brać przykład. Jestem bardzo zadowolona. Świetnie zapakowali moją przesyłkę. Różnorodność oferty i profesjonalna obsługa. Dziękuję za próbki w prezencie :)'],
            ['user_id' => 9, 'content' => 'Czysta i naprawdę dobrze zabezpieczona przesyłka. Wszystkie informacje ze strony zgodne z prawdą. Pracownik, podczas rozmowy telefonicznej, rozwiał wszystkie moje wątpliwości. Sklep warty polecenia, oryginalne produkty, wysoki poziom obsługi.'],
            ['user_id' => 10, 'content' => 'Dostawa bardzo punktualna. Dzięki obsłudze wiadomo, co wybrać w dobrej cenie. Duży plus za całkiem ładne opakowanie, w końcu jesteśmy wzrokowcami. Bezproblemowe zakupy, takie lubię najbardziej.'],
            ['user_id' => 11, 'content' => 'Fantastyczna relacja z klientami i bardzo przyjemne zakupy. Żadnego opóźnienia w dostawie.'],

        ]);
    }
}
