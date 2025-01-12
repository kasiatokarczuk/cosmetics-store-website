<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GlaMour</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <style>
        html, body {
            margin: 0;
            padding: 0;
        }

        .top-bar {
            background-color: #f8f9fa;
            padding: 10px 40px;
            display: flex;
            justify-content: flex-end;
            gap: 20px;
        }

        .top-bar a {
            text-decoration: none;
            color: black;
            font-size: 16px;
            transition: color 0.3s;
        }

        .top-bar a:hover {
            color: #FF80AB;
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

        /* Styl dla przycisku "Zaloguj się" w oknie modalnym */
        #loginModal .btn-primary {
            background-color: #FF80AB; /* Nowy kolor tła */
            border-color: #FF80AB;    /* Nowy kolor obramowania */
            color: white;             /* Kolor tekstu */
        }

        #loginModal .btn-primary:hover {
            background-color: #FF4F81; /* Kolor tła po najechaniu */
            border-color: #FF4F81;     /* Kolor obramowania po najechaniu */
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


    </style>
</head>
<body>
<div class="top-bar">
    <a href="{{ route('login') }}">Zaloguj się</a>
    <a href="{{ route('register') }}">Zarejestruj się</a>
</div>

<header>
    <a href="#" class="logo" >GlaMour</a>
    <div class="header-icons">
        <a href="#" title="Ulubione">
            <i class="far fa-heart"></i>
        </a>
        <a href="#" title="Koszyk" id="cart-icon">
            <i class="fas fa-shopping-cart"></i>
        </a>
    </div>
</header>

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

@php
    use App\Models\Opinion;

    $opinions = Opinion::with('user')->latest()->get();
@endphp

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


<!--zdjecia przesuwane-->
<section class="text-center py-5">
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
</section>

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

<section class="text-center py-5" style="background-color: #eeeeee;">
    <h3>Zapisz się do Newslettera</h3>
    <form>
        <input type="email" class="form-control w-50 mx-auto mb-3" placeholder="Wpisz swój e-mail">
        <button type="submit" class="btn btn-primary">Zapisz się</button>
    </form>
</section>

<footer class="text-center py-4 bg-dark text-white">
    <p>Kontakt | Płatności | Polityka prywatności</p>
    <p>&copy; 2025 GlaMour. Wszelkie prawa zastrzeżone.</p>
</footer>

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Zaloguj się</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Aby sprawdzić koszyk, musisz się zalogować.
            </div>
            <div class="modal-footer">
                <a href="{{ route('login') }}" class="btn btn-primary">Zaloguj się</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const isLoggedIn = @json(Auth::check()); // Laravel sprawdza logowanie

        const cartIcon = document.getElementById('cart-icon');
        const loginModal = new bootstrap.Modal(document.getElementById('loginModal'));

        cartIcon.addEventListener('click', function (e) {
            e.preventDefault();
            if (!isLoggedIn) {
                loginModal.show();
            } else {
                alert('Koszyk działa poprawnie dla zalogowanych użytkowników!');
            }
        });
    });
</script>
</body>
</html>
