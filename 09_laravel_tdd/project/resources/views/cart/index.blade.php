<x-app-layout>
    <style>
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

        .container {
            max-width: 1200px;
            margin: 0 auto;
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
        body {
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 1500px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
        }

        .card-body {
            padding: 1.5rem;
        }

        .btn {
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-outline-danger {
            color: #dc3545;
            border-color: #dc3545;
        }

        .btn-outline-danger:hover {
            background-color: #dc3545;
            color: white;
        }

        .btn-outline-secondary {
            color: #6c757d;
            border-color: #6c757d;
        }

        .btn-outline-secondary:hover {
            background-color: #6c757d;
            color: white;
        }

        .table {
            margin: 0 auto;
            width: 100%;
            border-spacing: 0 10px;
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

        .table-light {
            background-color: #f8f9fa;
        }

        .text-center {
            text-align: center;
        }

        .summary-card {
            background-color: #fafafa;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .summary-card p {
            margin-bottom: 1rem;
        }

        .summary-card strong {
            font-size: 1.25rem;
        }

        .alert {
            border-radius: 5px;
        }

        .rounded {
            border-radius: 10px;
        }

        .btn-warning {
            background-color: #ffc107;
            color: white;
            font-weight: bold;
            padding: 5px 10px;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        .mt-5.text-center {
            margin-bottom: 20px;
        }

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

        .d-flex {
            display: flex;
        }

        .justify-content-between {
            justify-content: space-between;
        }

        .align-items-center {
            align-items: center;
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
            <a href="#">PORADNIKI</a>
        </div>
    </nav>

    <div class="container my-5">
        <h2 style="font-size: 26px; font-weight: bold; text-align: left;">Twój koszyk</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (count($cart) > 0)
            <div class="row">
                <!-- Produkty w koszyku -->
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-header bg-light">
                            <h5 style="font-weight: 700; text-align: center;">Twoje produkty</h5>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-hover mb-0" style="border-spacing: 0 15px; border-collapse: separate;">
                                <thead class="table-light">
                                <tr>
                                    <th>Produkt</th>
                                    <th class="text-center">Ilość</th>
                                    <th class="text-center">Cena jednostkowa</th>
                                    <th class="text-center">Suma</th>
                                    <th class="text-center">Akcje</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($cart as $id => $item)
                                    <tr>
                                        <td>
                                            <div style="display: flex; align-items: center;">
                                                <img src="{{ asset('images/' . $item['image']) }}" alt="{{ $item['name'] }}"
                                                     style="width: 70px; height: 70px; object-fit: cover; margin-right: 15px; vertical-align: middle;">
                                                <span style="vertical-align: middle; font-size: 16px;">{{ $item['name'] }}</span>
                                            </div>
                                        </td>
                                        <td class="text-center align-middle">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <!-- Formularz do zmiany ilości (minus) -->
                                                <form action="{{ route('cart.update', ['id' => $id, 'action' => 'decrease']) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-outline-secondary">-</button>
                                                </form>

                                                <!-- Ilość produktu -->
                                                <span>{{ $item['quantity'] }}</span>

                                                <!-- Formularz do zmiany ilości (plus) -->
                                                <form action="{{ route('cart.update', ['id' => $id, 'action' => 'increase']) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-outline-secondary">+</button>
                                                </form>
                                            </div>
                                        </td>
                                        <td class="text-center align-middle">{{ number_format($item['price'], 2) }} zł</td>
                                        <td class="text-center align-middle">{{ number_format($item['quantity'] * $item['price'], 2) }} zł</td>
                                        <td class="text-center align-middle">
                                            <form action="{{ route('cart.remove') }}" method="POST" class="d-inline">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $id }}">
                                                <button type="submit" class="btn btn-outline-danger btn-sm">Usuń</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Podsumowanie koszyka -->
                <div class="col-lg-4">
                    <div class="summary-card">
                        <h5 class="mb-3">Podsumowanie zamówienia</h5>
                        <hr>
                        <p class="d-flex align-items-center mb-2">
                            <span>Łączna suma:</span>
                            <span class="ms-2"><strong>{{ number_format($total, 2) }} zł</strong></span>
                        </p>
                        <p class="d-flex align-items-center mb-2">
                            <span>Koszt wysyłki:</span>
                            <span class="ms-2"><strong>Do ustalenia</strong></span>
                        </p>
                        <hr>
                        <p class="d-flex align-items-center text-uppercase">
                            <strong>Razem:</strong>
                            <span class="ms-2"><strong>{{ number_format($total, 2) }} zł</strong></span>
                        </p>
                        <form action="{{ route('cart.clear') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-warning w-100 mb-3">Wyczyść koszyk</button>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-info text-center" style="font-size: 18px; padding: 5px;">Twój koszyk jest pusty.</div>
        @endif

        <div class="mt-5 text-center">
            <a href="{{ route('dashboard') }}" class="btn btn-outline-primary">Kontynuuj zakupy</a>
        </div>
    </div>
</x-app-layout>
