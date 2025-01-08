<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista produktów') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('products.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Dodaj nowy produkt</a>
                    <table class="mt-6 w-full table-auto border-collapse">
                        <thead>
                        <tr>
                            <th class="border px-4 py-2">Nazwa</th>
                            <th class="border px-4 py-2">Cena</th>
                            <th class="border px-4 py-2">Akcje</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td class="border px-4 py-2">{{ $product->name }}</td>
                                <td class="border px-4 py-2">{{ $product->price }} PLN</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('products.show', $product) }}" class="text-blue-500">Pokaż</a>
                                    <a href="{{ route('products.edit', $product) }}" class="ml-4 text-yellow-500">Edytuj</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
