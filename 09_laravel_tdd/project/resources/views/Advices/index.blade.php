<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PORADNIKI</title>
    <!-- Dodanie Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .card {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            border: 1px solid #e5e7eb;
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .card img {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }

        .card-content {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.5);
            padding: 1rem;
            color: white;
            transition: background 0.3s ease-in-out;
        }

        .card-content h3 {
            font-size: 1.25rem;
            margin: 0 0 0.25rem;
        }

        .card-content a {
            color: #e91e63;
            text-decoration: none;
            transition: color 0.3s;
        }

        .card-content a:hover {
            color: #ff4081;
        }

        .card:hover .card-content {
            background: rgba(0, 0, 0, 0.7);
        }

        .button-sort {
            background-color: #ec4899;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: bold;
            text-transform: uppercase;
            transition: background-color 0.3s ease;
            border: none;
        }

        .button-sort:hover {
            background-color: #d03685;
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

    </style>
</head>
<body class="bg-gray-100">

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
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Register
                        </a>
                    @endif
                    @endauth
                </nav>
                @endif
                </div>

<header>

    <a href="/#" class="logo" >GlaMour</a>

    <div class="header-icons">
        <a href="#" title="Ulubione">
            <i class="far fa-heart"></i>
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

<!-- Nagłówek -->
<header >
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-center" style="font-size: 2rem; color: #ec4899;">
            PORADNIKI
        </h2>
    </div>
</header>

<!-- Zawartość -->
<main class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">

                <!-- Sekcja sortowania -->
                <form method="GET" action="{{ route('Advices.index') }}" class="mb-4">
                    <label for="category" class="block text-lg font-bold text-gray-700">Filtruj po kategorii</label>
                    <select name="category" id="category" class="mt-1 block w-96 max-w-full bg-white border-gray-300 shadow-sm rounded-md">
                        <option value="">Wszystkie kategorie</option>
                        <option value="makijaż" {{ request('category') === 'makijaż' ? 'selected' : '' }}>Makijaż</option>
                        <option value="pielęgnacja" {{ request('category') === 'pielęgnacja' ? 'selected' : '' }}>Pielęgnacja</option>
                    </select>
                    <button type="submit" class="button-sort mt-3">Sortuj</button>
                </form>

                <!-- Wyświetlanie poradników -->
                @if($advices->isEmpty())
                    <p>There is no advice in the database.</p>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($advices as $item)
                            <div class="card">
                                @if($item->image)
                                    <img src="{{ asset('advices_images/' . $item->image) }}" alt="{{ $item->title }}">
                                @else
                                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                        <span class="text-gray-500">Brak zdjęcia</span>
                                    </div>
                                @endif
                                <div class="card-content">
                                    <h3>{{ $item->title }}</h3>
                                    <p>{{ $item->category }}</p>
                                    <a href="{{ route('Advices.show', $item) }}">Czytaj więcej</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                <!-- Przycisk do tworzenia nowego wpisu -->
                @if (Auth::check() && Auth::user()->isAdmin())
                <form method="GET" action="{{ route('Advices.create') }}" class="pt-6">
                    <button type="submit" class="button-sort">
                        Utwórz nowy poradnik
                    </button>
                </form>
                @endif
            </div>
        </div>
    </div>
</main>

</body>
</html>
