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

        /* Styl dla przycisków "Zaloguj się" w oknach modalnych */
        #loginModal .btn-primary,
        #loginModalFavorites .btn-primary {
            background-color: #FF80AB; /* Nowy kolor tła */
            border-color: #FF80AB;    /* Nowy kolor obramowania */
            color: white;             /* Kolor tekstu */
        }

        #loginModal .btn-primary:hover,
        #loginModalFavorites .btn-primary:hover {
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
        /* Stylizacja ogólna */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
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

        /* Kontener dla sekcji produktów */
        .products-container {
            width: 80%;
            margin: 40px auto;
            text-align: center;
        }

        /* Nagłówek sekcji */
        .products-header {
            font-size: 2.5em;
            font-weight: bold;
            margin-bottom: 30px;
            color: #333;
        }

        /* Siatka produktów */
        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* 3 kolumny */
            gap: 30px; /* Odstęp między produktami */
        }

        /* Pojedyncza karta produktu */
        .card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        /* Obraz produktu */
        .card img {
            width: 100%;
            height: 350px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        /* Nazwa produktu */
        .card-title {
            font-size: 1.2em;
            font-weight: bold;
            margin: 10px 0;
            color: #333;
        }

        /* Cena produktu */
        .card-price {
            color: #777;
            font-size: 1em;
            margin-bottom: 15px;
        }

        /* Linki akcji (ikony) */
        .card-actions a {
            text-decoration: none;
            font-size: 1.5em;
            color: #000;
            margin: 0 10px;
            transition: color 0.3s ease;
        }

        .card-actions a:hover {
            color: rgba(208, 80, 144, 0.92);
        }

        /* Formularz dodania do koszyka */
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

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }
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


        .new-badge {
            background-color: black;
            color: white;
        }


        .sale-badge {
            background-color: red;
            color: white;
        }


        .card {
            position: relative;
            overflow: hidden;
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
        <a href="#" title="Ulubione" id="favorites-icon">
            <i class="far fa-heart"></i>
        </a>
        <a href="#" title="Koszyk" id="cart-icon">
            <i class="fas fa-shopping-cart"></i>
        </a>
    </div>
</header>

<nav>
    <div class="dropdown">
        <a href="#nowosci">NOWOŚCI</a>
    </div>
    <div class="dropdown">
        <a href="#winter-sale">PROMOCJE</a>
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



<div class="products-container" id="nowosci">
    <h1 class="products-header">NOWOŚCI</h1>
    <div class="grid">
        @foreach($products as $product)
            <div class="card">
                <!-- Prostokąt z napisem NOWOŚĆ -->
                <div class="badge new-badge">NOWOŚĆ</div>
                <!-- Zdjęcie produktu -->
                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="product-image">
                <div class="card-title">{{ $product->name }}</div>
                <div class="card-price">{{ number_format($product->price, 2) }} PLN</div>
                <div class="card-actions">
                    <a href="{{ route('products.show', $product) }}" title="Pokaż">
                        <i class="fas fa-search"></i>
                    </a>
                    <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart" style="display: inline;">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" title="Dodaj do koszyka" style="background: none; border: none; padding: 0;">
                            <i class="fas fa-shopping-cart" style="color: #000; font-size: 1.5em;"></i>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="products-container" id="winter-sale">
    <h1 class="products-header">WINTER SALE -20%</h1>
    <div class="grid">
        @forelse($winterSaleProducts as $product)
            <div class="card">
                <!-- Prostokąt z napisem PROMOCJA -->
                <div class="badge sale-badge">PROMOCJA</div>
                <!-- Zdjęcie produktu -->
                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="product-image">
                <div class="card-title">{{ $product->name }}</div>
                <div class="card-price">
                        <span style="text-decoration: line-through; color: red;">
                            {{ number_format($product->price, 2) }} PLN
                        </span>
                    <span>{{ number_format($product->sale_price, 2) }} PLN</span>
                </div>
                <div class="card-actions">
                    <a href="{{ route('products.show', $product) }}" title="Pokaż">
                        <i class="fas fa-search"></i>
                    </a>
                    <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart" style="display: inline;">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" title="Dodaj do koszyka">
                            <i class="fas fa-shopping-cart"></i>
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <p>Brak produktów w promocji Winter SALE.</p>
        @endforelse
    </div>
</div>



<section class="newsletter-section text-center py-5" style="background-color: #fde4e4;">
    <h3>Zapisz się do naszego newslettera</h3>
    <form id="newsletter-form" class="newsletter-form d-flex justify-content-center align-items-center mt-3">
        <span class="discount-text me-2">Odbierz <strong>5% zniżki!</strong></span>
        <input
            id="email-input"
            type="email"
            class="form-control"
            placeholder="Wpisz swój e-mail"
            required
            style="max-width: 300px; border: 1px solid #000; border-radius: 5px; padding: 10px;">
        <button
            type="submit"
            class="btn btn-outline-dark ms-2"
            style="padding: 10px 20px; border: 1px solid #000; border-radius: 5px;">
            ZAPISZ SIĘ
        </button>
    </form>
    <p class="mt-2" style="font-size: 14px; color: #555;">
        Nie martw się, możesz zrezygnować w dowolnej chwili. Sprawdź naszą <a href="#" style="color: #555; text-decoration: underline;">politykę prywatności</a>.
    </p>

    <!-- Komunikaty -->
    <div id="success-message" class="alert alert-success mt-3" style="display: none; max-width: 400px; margin: 0 auto;">
        <strong>Sukces!</strong> Zostałeś poprawnie zapisany do newslettera.
    </div>
    <div id="error-message" class="alert alert-danger mt-3" style="display: none; max-width: 400px; margin: 0 auto;">
        <strong>Błąd!</strong> Wystąpił problem. Spróbuj ponownie.
    </div>
</section>

<script>
    document.getElementById("newsletter-form").addEventListener("submit", async function(event) {
        event.preventDefault(); // Zatrzymuje domyślne przesyłanie formularza

        const emailInput = document.getElementById("email-input").value.trim();
        const successMessage = document.getElementById("success-message");
        const errorMessage = document.getElementById("error-message");

        // Ukryj wcześniejsze komunikaty
        successMessage.style.display = "none";
        errorMessage.style.display = "none";

        if (emailInput) {
            try {
                const response = await fetch("{{ route('newsletter.subscribe') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    },
                    body: JSON.stringify({ email: emailInput }),
                });

                const data = await response.json();

                if (response.ok && data.status === "success") {
                    successMessage.innerText = data.message;
                    successMessage.style.display = "block";
                } else {
                    errorMessage.innerText = data.message || "Wystąpił problem. Spróbuj ponownie.";
                    errorMessage.style.display = "block";
                }
            } catch (error) {
                errorMessage.innerText = "Błąd sieci. Spróbuj ponownie później.";
                errorMessage.style.display = "block";
            }
        } else {
            errorMessage.innerText = "Wprowadź poprawny adres e-mail.";
            errorMessage.style.display = "block";
        }
    });
</script>


<footer class="text-center py-4 bg-dark text-white">
    <p>Kontakt | Płatności | Polityka prywatności</p>
    <p>&copy; 2025 GlaMour. Wszelkie prawa zastrzeżone.</p>
</footer>

<!-- Modal dla ulubionych-->
<div class="modal fade" id="loginModalFavorites" tabindex="-1" aria-labelledby="loginModalFavoritesLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalFavoritesLabel">Zaloguj się</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Aby dodawać produkty do ulubionych, musisz się zalogować.
            </div>
            <div class="modal-footer">
                <a href="{{ route('login') }}" class="btn btn-primary">Zaloguj się</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal dla koszyka-->
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
        const favoritesIcon = document.getElementById('favorites-icon');
        const loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
        const loginModalFavorites = new bootstrap.Modal(document.getElementById('loginModalFavorites'));

        cartIcon.addEventListener('click', function (e) {
            e.preventDefault();
            if (!isLoggedIn) {
                loginModal.show();
            } else {
                alert('Koszyk działa poprawnie dla zalogowanych użytkowników!');
            }
        });

        favoritesIcon.addEventListener('click', function (e) {
            e.preventDefault();
            if (!isLoggedIn) {
                loginModalFavorites.show();
            } else {
                alert('Ulubione działają poprawnie dla zalogowanych użytkowników!');
            }
        });
    });
</script>
</body>
</html>
