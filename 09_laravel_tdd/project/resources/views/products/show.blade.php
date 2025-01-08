<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Szczegóły produktu') }}: {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p><strong>Nazwa produktu:</strong> {{ $product->name }}</p>
                    <p><strong>Cena:</strong> {{ $product->price }} PLN</p>
                    <p><strong>Kategoria nadrzędna:</strong> {{ $product->parent_category }}</p>
                    <p><strong>Kategoria podrzędna:</strong> {{ $product->sub_category }}</p>
                    <p><strong>Liczba sztuk:</strong> {{ $product->quantity }}</p>
                    <p><strong>Opis:</strong> {{ $product->description }}</p>

                    @if($product->image)
                        <p><strong>Zdjęcie:</strong></p>
                        <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="w-64 h-64 object-cover mt-4">
                    @endif

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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
