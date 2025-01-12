<x-app-layout>
    <x-slot name="header">
        <!-- Stylizacja nagłówka PORADNIKI -->
        <h2 class="font-semibold text-xl text-center " style="font-size: 2rem; color: #ec4899;">
            {{ __('PORADNIKI') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <style>
                        .card {
                            position: relative;
                            overflow: hidden;
                            border-radius: 10px;
                            border: 1px solid #e5e7eb;
                            background-color: #ffffff;
                            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                            display: flex;
                            flex-direction: column;
                            height: 100%;
                        }

                        .card img {
                            width: 100%;
                            height: 300px;
                            object-fit: cover;
                        }

                        .card-content {
                            position: absolute;
                            bottom: 0;
                            left: 0;
                            width: 100%;
                            background: rgba(0, 0, 0, 0.5);
                            padding: 1rem;
                            color: white;
                            transition: background 0.3s ease-in-out;
                        }

                        .card-content h3 {
                            font-size: 1.25rem;
                            margin: 0 0 0.25rem;
                        }

                        .card-content a {
                            color: #e91e63; /* Różowy kolor */
                            text-decoration: none;
                            transition: color 0.3s;
                        }

                        .card-content a:hover {
                            color: #ff4081; /* Jaśniejszy różowy po najechaniu */
                        }

                        .card:hover .card-content {
                            background: rgba(0, 0, 0, 0.7); /* Zmiana tła po najechaniu */
                        }

                        /* Stylizacja przycisku "Sortuj" */
                        .button-sort {
                            background-color: #ec4899; /* Różowy kolor */
                            color: white;
                            padding: 10px 20px;
                            border-radius: 5px;
                            font-size: 1rem;
                            font-weight: bold;
                            text-transform: uppercase;
                            transition: background-color 0.3s ease;
                            border: none;
                        }

                        .button-sort:hover {
                            background-color: #d03685; /* Jaśniejszy różowy po najechaniu */
                        }
                    </style>

                    <!-- sekcja sortowania -->
                    <form method="GET" action="{{ route('Advices.index') }}" class="mb-4">
                        <label for="category" class="block text-sm font-medium text-gray-700">Filtruj po kategorii</label>
                        <select name="category" id="category" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            <option value="">Wszystkie kategorie</option>
                            <option value="makijaż" {{ request('category') === 'makijaż' ? 'selected' : '' }}>Makijaż</option>
                            <option value="pielęgnacja" {{ request('category') === 'pielęgnacja' ? 'selected' : '' }}>Pielęgnacja</option>
                        </select>
                        <!-- Przycisk Sortuj -->
                        <button type="submit" class="button-sort mt-3">Sortuj</button>
                    </form>

                    @if($advices->isEmpty())
                        <p>There is no advice in the database.</p>
                    @else
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($advices as $item)
                                <div class="card">
                                    <!-- Obrazek -->
                                    @if($item->image)
                                        <img src="{{ asset('advices_images/' . $item->image) }}" alt="{{ $item->title }}">
                                    @else
                                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                            <span class="text-gray-500">Brak zdjęcia</span>
                                        </div>
                                    @endif

                                    <!-- Overlay na dolnej części -->
                                    <div class="card-content">
                                        <h3>{{ $item->title }}</h3>
                                        <p>{{ $item->category }}</p>
                                        <a href="{{ route('Advices.show', $item) }}">Czytaj więcej</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <!-- Przycisk do tworzenia nowego wpisu -->
                    <form method="GET" action="{{ route('Advices.create') }}" class="pt-6">
                        <x-primary-button>
                            {{ __('Create new advice') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
