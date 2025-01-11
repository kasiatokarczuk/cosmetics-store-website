<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Produktów</title>
    <!-- Dodanie Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
            max-width: 1200px;
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
            height: 250px;
            object-fit: cover;
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
            color: #000000; /* Domyślny kolor ikony (czarny) */
            margin: 0 10px;
            transition: color 0.3s ease;
        }

        /* Kolor ikony po najechaniu */
        .card a:hover {
            color: rgba(208, 80, 144, 0.92); /* Różowy kolor przy najechaniu */
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

        .btn-all:hover {
            background-color: #000000;
        }
    </style>


</head>
<body>

<header>
    <a href="#" class="logo">GlaMour</a>
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

<div class="container">
    <div class="header">
        <h1>Lista Produktów</h1>
        <a href="{{ route('products.store') }}" class="btn-all">Zobacz wszystkie produkty</a>
    </div>

    <div class="grid">
        @foreach($products as $product)
            <div class="card">
                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">
                <div class="card-title">{{ $product->name }}</div>
                <div class="card-price">{{ $product->price }} PLN</div>
                <div>
                    <!-- Zamiana tekstu "Pokaż" na ikonę lupy -->
                    <a href="{{ route('products.show', $product) }}" title="Pokaż">
                        <i class="fas fa-search"></i> <!-- Ikona lupy -->
                    </a>
                    <a href="{{ route('products.edit', $product) }}" title="Edytuj">
                        <i class="fas fa-edit"></i> <!-- Ikona edycji -->
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>
