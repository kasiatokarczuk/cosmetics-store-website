<x-app-layout>
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
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

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
                margin-left: 40px;
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
            /* Styl przycisku zakładki */
            .btn-tab {
                background-color: white; /* Tło przycisku */
                color: black; /* Kolor tekstu */
                border-radius: 0 5px 5px 0; /* Zaokrąglenie po prawej stronie */
                box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2); /* Subtelny cień */
            }

            .btn-tab:hover {
                background-color: white; /* Zmiana koloru przycisku po najechaniu */
                color: deeppink;

            }

            /* Pasek opinii */
            #opinions-sidebar {
                box-shadow: 2px 0 10px rgba(0, 0, 0, 0.2); /* Cień dla paska */
            }
            .carousel-container {
                margin: 0 auto;       /* Wyśrodkowanie */
                width: 90%;           /* Szerokość 90% (5% marginesów z każdej strony) */
                max-width: 1200px;    /* Opcjonalnie maksymalna szerokość */
                
            }
            .carousel-item {
                height: 500px;
            }
            .carousel-item img {
                width: 100%;       /* Szerokość obrazu na 100% szerokości kontenera */
                height: 100%;      /* Zachowanie proporcji */
                object-fit: cover; /* Wypełnia kontener, przycinając obraz w razie potrzeby */
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
            <!-- Koszyk-->
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

    <!-- Menu -->
    <nav>
        <div class="dropdown">
            <a href="#">NOWOŚCI</a>
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
            <a href="#">PORADNIKI</a>
        </div>
    </nav>


    <!-- Wysuwany pasek opinii z przyciskiem -->
    <div id="opinions-sidebar" class="fixed left-0 top-0 w-1/3 bg-white h-full shadow-lg"
         style="transform: translateX(-100%); transition: transform 0.5s ease; z-index: 1000;">
        <!-- Zakładka przycisku -->
        <button id="opinions-button" class="btn-tab"
                style="position: absolute; top: 30%; right: -50px; writing-mode: vertical-rl;
               transform: rotate(180deg); font-size: 1.2rem; padding: 10px 20px;
               height: 120px; border: none;
               cursor: pointer; transition: background-color 0.1s ease;">
            Opinie
        </button>
        <!-- Wczytujemy widok z opiniami -->
        <div class="p-6">
            @include('opinions.index', ['opinions' => $opinions])
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const opinionsButton = document.getElementById('opinions-button');
            const opinionsSidebar = document.getElementById('opinions-sidebar');

            let isHoveringSidebar = false; // Flaga: czy kursor jest na pasku
            let isHoveringButton = false; // Flaga: czy kursor jest na przycisku

            // Funkcja otwierająca pasek z opiniami
            const openSidebar = () => {
                opinionsSidebar.style.transform = 'translateX(0)'; // Pasek na widoku
            };

            // Funkcja zamykająca pasek z opiniami
            const closeSidebar = () => {
                if (!isHoveringSidebar && !isHoveringButton) {
                    opinionsSidebar.style.transform = 'translateX(-100%)'; // Pasek poza ekranem
                }
            };

            // Eventy dla przycisku
            opinionsButton.addEventListener('mouseenter', () => {
                isHoveringButton = true;
                openSidebar();
            });

            opinionsButton.addEventListener('mouseleave', () => {
                isHoveringButton = false;
                closeSidebar();
            });

            // Eventy dla paska z opiniami
            opinionsSidebar.addEventListener('mouseenter', () => {
                isHoveringSidebar = true;
            });

            opinionsSidebar.addEventListener('mouseleave', () => {
                isHoveringSidebar = false;
                closeSidebar();
            });
        });

    </script>

    <!-- Zdjęcia przesuwane -->
    <section class="text-center py-4">
        <div class="carousel-container">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <!-- Wskaźniki -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>

                <!-- Zdjęcia karuzeli -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="/images_glowna/glowna1.png" class="d-block w-100" alt="Zdjęcie 1">
                    </div>
                    <div class="carousel-item">
                        <a href="{{ route('products.care') }}">
                            <img src="/images_glowna/glowna2.png" class="d-block w-100" alt="Zdjęcie 2">
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="{{ route('products.makeup') }}">
                            <img src="/images_glowna/glowna3.png" class="d-block w-100" alt="Zdjęcie 3">
                        </a>
                    </div>
                </div>

                <!-- Strzałki nawigacyjne -->
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Poprzedni</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Następny</span>
                </button>
            </div>
        </div>
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

</x-app-layout>
