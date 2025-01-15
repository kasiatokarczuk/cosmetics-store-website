<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Produktów</title>
    <!-- Dodanie Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* CSS dla layoutu */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 40px;
        }

        .logo {
            font-size: 40px;
            font-weight: bold;
            color: black;
            text-decoration: none;
        }

        .header-icons {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .header-icons a {
            color: black;
            font-size: 24px;
            text-decoration: none;
            transition: color 0.3s;
        }

        .header-icons a:hover {
            color: #FF80AB;
        }

        nav {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 10px;
        }

        nav a {
            text-decoration: none;
            color: black;
            font-size: 20px;
            font-weight: bold;
            transition: color 0.3s;
            padding: 15px;
        }

        nav a:hover {
            color: #FF80AB;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            margin-top: 10px;
            list-style: none;
            padding: 10px 0;
            background: white;
            border: 0 solid #ddd;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .dropdown-menu a {
            color: black;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
            white-space: nowrap;
            font-size: 18px;
            font-weight: normal;
        }

        .dropdown-menu a:hover {
            color: #FF80AB;
            font-weight: normal;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* 3 kolumny */
            gap: 50px; /* Odstępy między elementami */
        }

        .card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 15px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card img {
            width: 100%;
            height: 350px;
            border-radius: 10px;
        }

        .card-title {
            font-size: 1.2em;
            font-weight: bold;
            margin: 10px 0;
        }

        .card-price {
            color: #555;
            font-size: 1em;
            margin-bottom: 10px;
        }

        .card a {
            text-decoration: none;
            font-size: 1.5em;
            color: #000000;
            margin: 0 10px;
            transition: color 0.3s ease;
        }

        .card a:hover {
            color: rgba(208, 80, 144, 0.92);
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .btn-all {
            display: inline-block;
            background-color: rgba(208, 80, 144, 0.92);
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin-bottom: 20px;
        }

        .btn-add {
            display: inline-block;
            background-color: rgba(232, 14, 14, 0.92);
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin-bottom: 20px;
        }

        .btn-all:hover {
            background-color: #000000;
        }

        .btn-add:hover {
            background-color: #000000;
        }

        .add-to-cart button {
            background: none;
            border: none;
            padding: 0;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .add-to-cart button i {
            color: #000;
            font-size: 1.5em;
        }


        .add-to-cart button:hover i {
            color: rgba(208, 80, 144, 0.92) !important;
        }



        .layout {
            display: flex;
            gap: 20px;
        }

        .filter {
            width: 20%;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .filter h2, .filter h3 {
            margin-bottom: 15px;
            font-size: 18px;
            font-weight: bold;
        }

        .filter label {
            display: block;
            margin-bottom: 5px;
        }

        .filter input, .filter select {
            width: 90%;
            padding: 8px 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .filter .btn-all {
            width: 100%;
            text-align: center;
        }

        .btn-reset {
            display: inline-block;
            background-color: rgba(154, 149, 152, 0.92);
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 10px;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .btn-reset:hover {
            background-color: #000000;
        }
        /* Styl dla odznaki "PROMOCJA" */
        .badge {
            position: absolute;
            top: 10px;
            left: 10px;
            padding: 5px 10px;
            font-size: 14px;
            font-weight: bold;
            text-transform: uppercase;
            color: #fff;
            border-radius: 5px;
            z-index: 10;
        }

        .sale-badge {
            background-color: red; /* Czerwony prostokąt */
            color: white;          /* Biały tekst */
        }

        /* Styl dla kart */
        .card {
            position: relative;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }
        .new-badge {
            background-color: black;
            color: white;
            position: absolute;
            top: 10px;
            left: 10px;
            padding: 5px 10px;
            font-size: 14px;
            font-weight: bold;
            text-transform: uppercase;
            border-radius: 5px;
            z-index: 10;
        }

        .add-to-favorites button {
            background: none;
            border: none;
            padding: 0;
            cursor: pointer;
            transition: color 0.3s ease;
            margin-left: 10px; /* Odstęp od przycisku koszyka */
        }

        .add-to-favorites button i {
            color: #000;
            font-size: 1.5em;
        }

        .add-to-favorites button:hover i {
            color: rgba(208, 80, 144, 0.92); /* Kolor różowy */
        }

        .add-to-cart button i:hover, .add-to-favorites button i:hover {
            color: rgba(208, 80, 144, 0.92) !important;
        }


    </style>


</head>
<body>
<div class="flex lg:justify-center lg:col-start-2" >

    @if (Route::has('login'))
            @auth
            <nav class="-mx-3 flex flex-1 justify-center">
                <div style="width:100%">
                    @include('layouts.navigation')

                    <!-- Page Heading -->
                    @isset($header)
                        <header class="bg-white shadow">
                            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                                {{ $header }}
                            </div>
                        </header>
                    @endisset

               </div>
            @else
                    <nav class="-mx-3 flex flex-1 justify-end">
                <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                    Zaloguj się
                </a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Zarejstruj się
                    </a>
                @endif
            @endauth
        </nav>
    @endif
</div>
<header>
    @if (Route::has('login'))
        @auth
        <a href="/dashboard" class="logo">GlaMour</a>
    @else
        <a href="/" class="logo">GlaMour</a>
    @endif
    @endauth
    <div class="header-icons">
        <a href="{{ route('favorites.index') }}" title="Ulubione" style="position: relative; display: inline-block;">
            <i class="far fa-heart"></i>
            @if($favoritesCount > 0)
                <span style="
                    position: absolute;
                    top: -10px;
                    right: -10px;
                    background-color: #FF80AB;
                    color: white;
                    border-radius: 50%;
                    width: 20px;
                    height: 20px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    font-size: 12px;
                    font-weight: bold;
                ">
                    {{ $favoritesCount }}
                </span>
            @endif
        </a>
        <a href="{{ route('cart.index') }}" title="Koszyk" style="position: relative; display: inline-block;">
            <i class="fas fa-shopping-cart"></i>
            @if($cartCount > 0)
                <span style="
            position: absolute;
            top: -10px;
            right: -10px;
            background-color: #FF80AB;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 12px;
            font-weight: bold;
        ">
            {{ $cartCount }}
        </span>
            @endif
        </a>
    </div>
</header>

<nav>
    <div class="dropdown">
        <a href="/#nowosci">NOWOŚCI</a>
    </div>
    <div class="dropdown">
        <a href="#">PROMOCJE</a>
    </div>
    <div class="dropdown">
        <a href="{{ route('products.makeup') }}">MAKIJAŻ</a>
        <ul class="dropdown-menu">
            <li><a href="{{ route('products.eye') }}">Oko</a></li>
            <li><a href="{{ route('products.face') }}">Twarz</a></li>
            <li><a href="{{ route('products.mouth') }}">Usta</a></li>
        </ul>
    </div>
    <div class="dropdown">
        <a href="{{ route('products.care') }}">PIELĘGNACJA</a>
        <ul class="dropdown-menu">
            <li><a href="{{ route('products.body') }}">Ciało</a></li>
            <li><a href="{{ route('products.hair') }}">Włosy</a></li>
        </ul>
    </div>
    <div class="dropdown">
        <a href="{{ route('Advices.index') }}">PORADNIKI</a>
    </div>
</nav>

<div class="container">
    <div class="header">
        <p>Obecnie wyświetlanych produktów: {{ $productCount }}</p>
        <a href="{{ route('products.index') }}" class="btn-all">Zobacz wszystkie produkty</a>

        @if (Auth::check() && Auth::user()->isAdmin())
            <div class="mt-4">
                <a href="{{ route('products.create') }}" class="btn-add">Dodaj produkty</a>
            </div>
        @endif

        <h2>
            Produkty:
            @if(request()->segment(3) === 'eye')
                Oko
            @elseif(request()->segment(3) === 'face')
                Twarz
            @elseif(request()->segment(3) === 'mouth')
                Usta
            @elseif(request()->segment(3) === 'body')
                Ciało
            @elseif(request()->segment(3) === 'hair')
                Włosy
            @elseif(request()->segment(2) === 'makeup')
                    Makijaż
            @elseif(request()->segment(2) === 'care')
                Pielęgnacja
            @else
                Wszystkie produkty
            @endif
        </h2>
    </div>
    @php
        $basicUrl = url()->current();
    @endphp

    <div class="layout">
        <!-- Sekcja filtrowania i sortowania -->
        <aside class="filter">
            <h2>Filtruj produkty</h2>
            <form method="GET" action="{{ url()->current() }}">
                <label for="min_price">Cena minimalna:</label>
            <input type="number" id="min_price" name="min_price" value="{{ request('min_price') }}">

            <label for="max_price">Cena maksymalna:</label>
            <input type="number" id="max_price" name="max_price" value="{{ request('max_price') }}">

            <label for="sort">Sortuj według:</label>
            <select id="sort" name="sort">
                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Najnowsze</option>
                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Cena rosnąco</option>
                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Cena malejąco</option>
            </select>

            <button type="submit" class="btn-all">Zastosuj</button>
            <a href="{{ $basicUrl }}" class="btn-reset">Usuń filtry</a>

        </form>
        </aside>

        <main class="product-list">
            @if($products->isEmpty())
                <p>Brak produktów w wybranym przedziale cenowym.</p>
            @else
    <div class="grid">
        @foreach($products as $product)
            <div class="card">
                    <!-- Prostokąt z napisem PROMOCJA -->
                @if($product->sale_price)
                    <div class="badge sale-badge">PROMOCJA</div>
                @endif
                    <!-- Zdjęcie produktu -->
                    @if($product->image)
                        <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="product-image">
                    @else
                        <div class="w-full bg-gray-200 flex items-center justify-center" style="border-radius: 10px;height: 350px;">
                            <span class="text-gray-500">Brak zdjęcia</span>
                        </div>
                    @endif
                    <div class="card-title">{{ $product->name }}</div>

                    <div class="card-price">
                        @if($product->sale_price)
                            <!-- Wyświetl przecenioną cenę -->
                            <span style="color: red; font-weight: bold;">
            {{ number_format($product->sale_price, 2) }} PLN
        </span>
                            <!-- Przekreślona cena oryginalna -->
                            <span style="text-decoration: line-through; color: grey; margin-left: 10px;">
            {{ number_format($product->price, 2) }} PLN
        </span>
                        @else
                            <!-- Wyświetl zwykłą cenę -->
                            <span>
            {{ number_format($product->price, 2) }} PLN
        </span>
                        @endif
                    </div>


                <div>
                    <!-- Zamiana tekstu "Pokaż" na ikonę lupy -->
                    <a href="{{ route('products.show', $product) }}" title="Pokaż">
                        <i class="fas fa-search"></i> <!-- Ikona lupy -->
                    </a>
                    <!-- Formularz z ikoną koszyka -->
                    <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart" style="display: inline;">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="quantity" value="1"> <!-- Domyślna ilość to 1 -->
                        <button type="submit" title="Dodaj do koszyka" style="background: none; border: none; padding: 0;">
                            <i class="fas fa-shopping-cart" style="color: #000; font-size: 1.5em;"></i>
                        </button>
                    </form>
                    <!-- Dodawanie do ulubionych -->
                    <form action="{{ route('favorites.add') }}" method="POST" class="add-to-favorites" style="display: inline;">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" title="Dodaj do ulubionych" style="background: none; border: none; padding: 0;">
                            <i class="far fa-heart" style="color: #000; font-size: 1.5em; margin-left: 10px;"></i>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
        @endif
        </main>
    </div>
</div>

<<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('.add-to-cart').on('submit', function (e) {
            e.preventDefault();

            const form = $(this);
            const formData = form.serialize();

            // Pobranie danych o produkcie
            const productName = form.closest('.card').find('.card-title').text();
            const productImage = form.closest('.card').find('img').attr('src');

            // Pobranie ceny i stylów
            let productPriceText = '';
            let productPriceStyle = '';
            let originalPriceText = '';
            let originalPriceStyle = '';

            // Sprawdzanie, czy produkt ma cenę promocyjną
            const salePriceElement = form.closest('.card').find('.card-price span:first-child'); // przeceniona cena
            const originalPriceElement = form.closest('.card').find('.card-price span:last-child'); // oryginalna cena

            if (salePriceElement.length) {
                productPriceText = salePriceElement.text(); // Tekst przecenionej ceny
                productPriceStyle = salePriceElement.attr('style'); // Styl przecenionej ceny
            }

            if (originalPriceElement.length) {
                originalPriceText = originalPriceElement.text(); // Tekst oryginalnej ceny
                originalPriceStyle = originalPriceElement.attr('style'); // Styl oryginalnej ceny
            }

            // Wysyłanie żądania AJAX
            $.ajax({
                url: form.attr('action'),
                method: 'POST',
                data: formData,
                success: function (response) {
                    // Wyświetlenie ładnego okienka SweetAlert2
                    Swal.fire({
                        title: 'Produkt dodany do koszyka!',
                        html: `
                            <div style="display: flex; align-items: center; justify-content: center; gap: 20px; margin-bottom: 20px; text-align: center;">
                                <img src="${productImage}" alt="${productName}" style="width: 100px; height: 100px; object-fit: cover; border-radius: 10px;">
                                <div>
                                    <p><strong>${productName}</strong></p>
                                    ${productPriceText ? `
                                    <p style="${productPriceStyle}">Cena: ${productPriceText}</p>` : ''}
                                    ${originalPriceText && !productPriceText ? `
                                    <p style="${originalPriceStyle}">Cena: ${originalPriceText}</p>` : ''}
                                </div>
                            </div>
                            <div style="display: flex; justify-content: center; gap: 10px; margin-top: 20px; height: 50px;">
                                <button id="continue-shopping" class="swal2-confirm swal2-styled" style="background-color: #ccc; color: #000; border-radius: 5px; text-decoration: none; padding: 10px 20px; width: 200px;">Kontynuuj zakupy</button>
                                <a href="{{ route('cart.index') }}" class="swal2-confirm swal2-styled" style="background-color: #d05090; color: #fff; border-radius: 5px; text-decoration: none; padding: 10px 20px; width: 200px; font-weight: bold; display: flex; justify-content: center; align-items: center;">Przejdź do koszyka</a>
                            </div>
                        `,
                        showConfirmButton: false,
                        customClass: {
                            popup: 'animated fadeInDown'
                        }
                    });

                    // Obsługa przycisku "Kontynuuj zakupy"
                    $(document).on('click', '#continue-shopping', function () {
                        Swal.close();
                    });
                },
                error: function (response) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Błąd',
                        text: 'Wystąpił błąd podczas dodawania produktu do koszyka.',
                    });
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function () {
        $('.add-to-favorites').on('submit', function (e) {
            e.preventDefault();

            const form = $(this);
            const formData = form.serialize();

            // Pobranie danych o produkcie
            const productName = form.closest('.card').find('.card-title').text();
            const productImage = form.closest('.card').find('img').attr('src');

            // Pobranie ceny i stylów
            let productPriceText = '';
            let productPriceStyle = '';
            let originalPriceText = '';
            let originalPriceStyle = '';

            // Sprawdzanie, czy produkt ma cenę promocyjną
            const salePriceElement = form.closest('.card').find('.card-price span:first-child'); // przeceniona cena
            const originalPriceElement = form.closest('.card').find('.card-price span:last-child'); // oryginalna cena

            if (salePriceElement.length) {
                productPriceText = salePriceElement.text(); // Tekst przecenionej ceny
                productPriceStyle = salePriceElement.attr('style'); // Styl przecenionej ceny
            }

            if (originalPriceElement.length) {
                originalPriceText = originalPriceElement.text(); // Tekst oryginalnej ceny
                originalPriceStyle = originalPriceElement.attr('style'); // Styl oryginalnej ceny
            }

            // Wysyłanie żądania AJAX
            $.ajax({
                url: form.attr('action'),
                method: 'POST',
                data: formData,
                success: function (response) {
                    // Wyświetlenie ładnego okienka SweetAlert2
                    Swal.fire({
                        title: 'Produkt dodany do ulubionych!',
                        html: `
                            <div style="display: flex; align-items: center; justify-content: center; gap: 20px; margin-bottom: 20px; text-align: center;">
                                <img src="${productImage}" alt="${productName}" style="width: 100px; height: 100px; object-fit: cover; border-radius: 10px;">
                                <div>
                                    <p><strong>${productName}</strong></p>
                                    ${productPriceText ? `
                                    <p style="${productPriceStyle}">Cena: ${productPriceText}</p>` : ''}
                                    ${originalPriceText && !productPriceText ? `
                                    <p style="${originalPriceStyle}">Cena: ${originalPriceText}</p>` : ''}
                                </div>
                            </div>
                            <div style="display: flex; justify-content: center; gap: 10px; margin-top: 20px; height: 50px;">
                                <button id="continue-shopping" class="swal2-confirm swal2-styled" style="background-color: #ccc; color: #000; border-radius: 5px; text-decoration: none; padding: 10px 20px; width: 200px;">Kontynuuj zakupy</button>
                                <a href="{{ route('favorites.index') }}" class="swal2-confirm swal2-styled" style="background-color: #d05090; color: #fff; border-radius: 5px; text-decoration: none; padding: 10px 20px; width: 200px; font-weight: bold; display: flex; justify-content: center; align-items: center;">Przejdź do ulubionych</a>
                            </div>
                        `,
                        showConfirmButton: false,
                        customClass: {
                            popup: 'animated fadeInDown'
                        }
                    });

                    // Obsługa przycisku "Kontynuuj zakupy"
                    $(document).on('click', '#continue-shopping', function () {
                        Swal.close();
                    });
                },
                error: function (response) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Błąd',
                        text: 'Wystąpił błąd podczas dodawania produktu do ulubionych.',
                    });
                }
            });
        });
    });
</script>



</body>
</html>
