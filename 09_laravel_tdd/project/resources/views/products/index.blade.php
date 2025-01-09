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

        .btn-add {
            display: inline-block;
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin-bottom: 20px;
        }

        .btn-add:hover {
            background-color: #0056b3;
        }
    </style>


</head>
<body>
<div class="container">
    <div class="header">
        <h1>Lista Produktów</h1>
        <a href="{{ route('products.create') }}" class="btn-add">Dodaj nowy produkt</a>
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
