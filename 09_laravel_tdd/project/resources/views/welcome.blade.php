<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GlaMour</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome (dla ikon) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        html, body {
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
            padding:15px;
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
    </style>
</head>


<header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
    <div class="flex lg:justify-center lg:col-start-2">
        <!-- Logo -->
        <svg class="h-12 w-auto text-white lg:h-16 lg:text-[#FF2D20]" viewBox="0 0 62 65" fill="none" xmlns="http://www.w3.org/2000/svg">
            <!-- SVG content -->
        </svg>
    </div>
    @if (Route::has('login'))
        <nav class="-mx-3 flex flex-1 justify-end">
            @auth
                <a href="{{ url('/dashboard') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                    Dashboard
                </a>
            @else
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
</header>

<!-- Header -->
<header>
    <!-- Logo -->
    <a href="#" class="logo">GlaMour</a>
    <!-- Koszyk i Ulubione -->
    <div class="header-icons">
        <!-- Ulubione -->
        <a href="#" title="Ulubione">
            <i class="far fa-heart"></i>
        </a>
        <!-- Koszyk -->
        <a href="#" title="Koszyk">
            <i class="fas fa-shopping-cart"></i>
        </a>
    </div>
</header>

<!-- Menu -->
<nav>
    <div class="dropdown">
        <a href="#">NOWOŚCI</a>
    </div>
    <div class="dropdown">
        <a href="#">PROMOCJE</a>
    </div>
    <div class="dropdown">
        <a href="#">MAKIJAŻ</a>
        <ul class="dropdown-menu">
            <li><a href="#">Oko</a></li>
            <li><a href="#">Twarz</a></li>
            <li><a href="#">Usta</a></li>
        </ul>
    </div>
    <div class="dropdown">
        <a href="#">PIELĘGNACJA</a>
        <ul class="dropdown-menu">
            <li><a href="#">Ciało</a></li>
            <li><a href="#">Włosy</a></li>
        </ul>
    </div>
    <div class="dropdown">
        <a href="#">PORADNIKI</a>
    </div>
</nav>

<!-- Hero Section -->
<section class="text-center py-5">
    <h1 class="display-4">Zdjęcia przesuwane</h1>
    <p>Odkryj naszą wyjątkową ofertę kosmetyków premium.</p>
</section>

<!-- Winter Sale -->
<section class="container my-5">
    <h2 class="text-center mb-4">Winter Sale - Do -50%</h2>
    <div class="row">

        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">RIMMEL</h5>
                    <p class="card-text">28,00 zł</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">MAYBELLINE</h5>
                    <p class="card-text">27,99 zł</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter -->
<section class="text-center py-5" style="background-color: #eeeeee;">
    <h3>Zapisz się do Newslettera</h3>
    <form>
        <input type="email" class="form-control w-50 mx-auto mb-3" placeholder="Wpisz swój e-mail">
        <button type="submit" class="btn btn-primary">Zapisz się</button>
    </form>
</section>

<!-- Footer -->
<footer class="text-center py-4 bg-dark text-white">
    <p>Kontakt | Płatności | Polityka prywatności</p>
    <p>&copy; 2025 GlaMour. Wszelkie prawa zastrzeżone.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</html>
