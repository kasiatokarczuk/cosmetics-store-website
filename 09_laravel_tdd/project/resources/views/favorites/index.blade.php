<x-app-layout>
    <style>
        /* Styl nagłówka */
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

        /* Styl nawigacji */
        nav {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 10px;
            margin-bottom: 50px;
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


        /* Styl kontenera */
        .container {
            max-width: 1500px;
            margin: 0 auto;
        }

        /* Styl karty produktów */
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 1.5rem;
        }

        .btn {
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-primary {
            background-color: #60a4ed;
            color: white;
            font-weight: bold;
            padding: 5px 10px;
        }

        .btn-primary:hover {
            background-color: #2e639f;
        }

        .table th,
        .table td {
            vertical-align: middle;
            text-align: center;
            padding: 1px;
        }

        .table-hover tbody tr:hover {
            background-color: #f8f9fa;
        }

        .text-center {
            text-align: center;
        }

        .alert {
            border-radius: 5px;
        }

        .btn-warning {
            background-color: #ffc107;
            color: white;
            font-weight: bold;
            padding: 5px 10px;
            margin-top: 10px;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        /* Styl przycisku do kontynuacji zakupów */
        .btn-outline-primary {
            background-color: #FF80AB;
            color: white;
            border: none;
            padding: 5px 10px;
            font-size: 15px;
            border-radius: 8px;
            transition: background-color 0.3s ease, transform 0.2s ease;
            display: inline-block;
            text-align: center;
            font-weight: bold;
        }

        .btn-outline-primary:hover {
            background-color: #E57399;
            color: white;
        }

        .card-body {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-body img {
            width: 150px;
            height: auto;
            object-fit: cover;
            margin-right: 20px;
        }

        .card-body .product-info {
            flex-grow: 1;
            margin-right: 20px;
        }

        .card-body .btn-danger {
            min-width: 150px;
            color: #dc3545;
            border-color: #dc3545;
        }

        .remove-favorite-btn {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            border: none;
            background: none;
            width: 40px;
            height: 40px;
        }

        .remove-favorite-btn i {
            font-size: 18px;
            color: white;
            background-color: #ccc;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s ease;
        }

        .remove-favorite-btn:hover i {
            background-color: #999;
        }


    </style>

    <header>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <a href="/dashboard" class="logo">GlaMour</a>
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
            <a href="{{ route('Advices.index') }}">PORADNIKI</a>
        </div>
    </nav>

    <div class="container my-5">
        <h2 style="font-size: 26px; font-weight: bold; text-align: left;">Twoje ulubione produkty</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (count($favorites) > 0)
            <div class="mb-3">
                <form action="{{ route('favorites.clear') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-warning">Usuń wszystkie ulubione</button>
                </form>
            </div>

            <div class="row">
                @foreach ($favorites as $id => $product)
                    @if (is_array($product))
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <!-- Zdjęcie produktu po lewej stronie -->
                                    <img src="{{ asset('images/' . $product['image']) }}" alt="{{ $product['name'] }}">

                                    <!-- Informacje o produkcie w środku -->
                                    <div class="product-info">
                                        <h5 class="card-title">{{ $product['name'] }}</h5>
                                        <p class="card-text">{{ number_format($product['price'], 2) }} zł</p>
                                    </div>

                                    <!-- Przycisk "Dodaj do koszyka" -->
                                    <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $id }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit" class="btn btn-primary" title="Dodaj do koszyka">Dodaj do koszyka</button>
                                    </form>

                                    <!-- Przycisk "Usuń z ulubionych" po prawej stronie -->
                                    <form action="{{ route('favorites.remove') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $id }}">
                                        <button class="btn btn-danger remove-favorite-btn" title="Usuń z ulubionych">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>


                    @else
                        <p>Nieprawidłowy format danych w ulubionych.</p>
                    @endif
                @endforeach
            </div>
        @else
            <div class="alert alert-info text-center" style="font-size: 18px; padding: 5px;">
                Nie masz żadnych ulubionych produktów.
            </div>
        @endif

        <div class="mt-5 text-center">
            <a href="{{ route('dashboard') }}" class="btn btn-outline-primary">Kontynuuj zakupy</a>
        </div>
    </div>
</x-app-layout>
