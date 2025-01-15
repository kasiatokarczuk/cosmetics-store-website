<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Szczegóły poradnika</title>
    <!-- Dodanie Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
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

        .header {
            text-align: center;
            margin-bottom: 20px;
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
<header>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-center" style="font-size: 2rem; color: #ec4899;">
            Szczegóły poradnika
        </h2>
    </div>
</header>

<!-- Główna zawartość -->
<main class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 text-center">
                <!-- Tytuł poradnika -->
                <h1 class="font-bold mb-4" style="font-size: 3rem; color: #000;">
                    {{ $advice->title }}
                </h1>

                <!-- Kategoria -->
                <p class="text-xl font-bold mb-4" style="color: #ec4899;">
                    Kategoria: {{ $advice->category }}
                </p>

                <!-- Szczegóły -->
                <div class="mb-4 text-center">
                    <strong style="font-size: 1.25rem; color: #000;">Szczegóły:</strong>
                    <p class="mt-2" style="font-size: 1rem;">{{ $advice->content }}</p>
                </div>

                <!-- Obrazek -->
                @if($advice->image)
                    <div class="mb-4">
                        <img src="{{ asset('advices_images/' . $advice->image) }}"
                             alt="{{ $advice->title }}"
                             style="width: 100%; max-height: 400px; object-fit: cover; border-radius: 10px;">
                    </div>
                @endif

                <!-- Przycisk Edytuj i Usuń -->
                @if (Auth::check() && Auth::user()->isAdmin())
                <div class="mt-4 flex justify-end space-x-4">
                    <!-- Przycisk Edytuj -->
                    <a href="{{ route('Advices.edit', $advice) }}"
                       style="background-color: #f9a8d4; color: white; padding: 0.5rem 1rem; border-radius: 5px; text-decoration: none;">
                        Edytuj
                    </a>

                    <!-- Przycisk Usuń -->
                    <form method="POST" action="{{ route('Advices.destroy', $advice) }}" onsubmit="return confirm('Jesteś pewny, że chcesz usunąć ten poradnik?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                style="background-color: #000; color: white; padding: 0.5rem 1rem; border-radius: 5px;">
                            Usuń
                        </button>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>
</main>

</body>
</html>
