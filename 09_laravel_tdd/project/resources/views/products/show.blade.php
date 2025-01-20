<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Szczegóły produktu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">

    <style>
        .btn-all {
            display: inline-block;
            background-color: rgba(208, 80, 144, 0.92);
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 20px;
        }

        .btn-all:hover {
            background-color: #000000;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans">

<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Szczegóły produktu') }}: {{ $product->name }}
        </h2>
    </div>
</header>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex">
                    <!-- Kolumna po lewej stronie: Zdjęcie -->
                    <div class="flex-shrink-0 mr-8"  style="width: 400px; height: 400px;">
                        @if($product->image)
                            <img src="{{ asset('images/' . $product->image) }}" alt="Product Image" style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">
                        @else
                            <div class="w-full bg-gray-200 flex items-center justify-center" style="border-radius: 10px;height: 350px;">
                                <span class="text-gray-500">Brak zdjęcia</span>
                            </div>
                        @endif
                    </div>

                    <!-- Kolumna po prawej stronie: Szczegóły produktu -->
                    <div class="flex-grow">
                        <p><strong>Nazwa produktu:</strong> {{ $product->name }}</p>
                        <p><strong>Cena:</strong> {{ $product->price }} PLN</p>
                        <p><strong>Kategoria nadrzędna:</strong> {{ $product->parent_category }}</p>
                        <p><strong>Kategoria podrzędna:</strong> {{ $product->sub_category }}</p>
                        <p><strong>Liczba sztuk:</strong> {{ $product->quantity }}</p>
                        <p><strong>Opis:</strong> {{ $product->description }}</p>
                        @if (Auth::check() && Auth::user()->isAdmin())
                        <div class="mt-4">
                            <a href="{{ route('products.edit', $product) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md">Edytuj produkt</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline-block ml-4">
                                @csrf
                                @method('DELETE')
                                <x-primary-button class="bg-red-500">
                                    {{ __('Usuń produkt') }}
                                </x-primary-button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <a href="{{ route('products.index') }}" class="btn-all">Zobacz wszystkie produkty</a>
        </div>
    </div>
</body>
</html>
