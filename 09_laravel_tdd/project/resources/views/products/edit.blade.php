<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edytuj produkt') }}: {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Nazwa produktu -->
                        <div>
                            <x-input-label for="name" :value="__('Nazwa produktu')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                          :value="old('name', $product->name)" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Cena -->
                        <div class="mt-4">
                            <x-input-label for="price" :value="__('Cena')" />
                            <x-text-input id="price" class="block mt-1 w-full" type="number" step="0.01" name="price"
                                          :value="old('price', $product->price)" />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>

                        <!-- Kategoria nadrzędna -->
                        <div class="mt-4">
                            <x-input-label for="parent_category" :value="__('Kategoria nadrzędna')" />
                            <select id="parent_category" name="parent_category" class="block mt-1 w-full">
                                <option value="" disabled selected>Wybierz kategorię nadrzędną</option>
                                <option value="Makijaż" {{ old('parent_category', $product->parent_category) === 'Makijaż' ? 'selected' : '' }}>Makijaż</option>
                                <option value="Pielęgnacja" {{ old('parent_category', $product->parent_category) === 'Pielęgnacja' ? 'selected' : '' }}>Pielęgnacja</option>
                            </select>
                            <x-input-error :messages="$errors->get('parent_category')" class="mt-2" />
                        </div>

                        <!-- Kategoria podrzędna -->
                        <div class="mt-4">
                            <x-input-label for="sub_category" :value="__('Kategoria podrzędna')" />
                            <select id="sub_category" name="sub_category" class="block mt-1 w-full">
                                <option value="" disabled selected>Wybierz kategorię podrzędną</option>
                            </select>
                            <x-input-error :messages="$errors->get('sub_category')" class="mt-2" />
                        </div>

                        <!-- Liczba sztuk -->
                        <div class="mt-4">
                            <x-input-label for="quantity" :value="__('Liczba sztuk')" />
                            <x-text-input id="quantity" class="block mt-1 w-full" type="number" name="quantity"
                                          :value="old('quantity', $product->quantity)" required />
                            <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                        </div>

                        <!-- Zdjęcie produktu -->
                        <div class="mt-4">
                            <x-input-label for="image" :value="__('Zdjęcie produktu')" />
                            <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" />
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="mt-4 w-64 h-64 object-cover">
                            @endif
                        </div>

                        <!-- Opis produktu -->
                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Opis produktu')" />
                            <textarea id="description" name="description" class="block mt-1 w-full" rows="4">{{ old('description', $product->description) }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Zaktualizuj produkt') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const parentCategory = document.getElementById('parent_category');
            const subCategory = document.getElementById('sub_category');

            // Opcje kategorii podrzędnych
            const subCategories = {
                'Makijaż': ['Oko', 'Twarz', 'Usta'],
                'Pielęgnacja': ['Ciało', 'Włosy']
            };

            // Funkcja do aktualizacji opcji kategorii podrzędnej
            function updateSubCategoryOptions(selectedCategory, selectedSubCategory = null) {
                subCategory.innerHTML = '';

                // Dodaj opcje w zależności od wybranej kategorii nadrzędnej
                if (subCategories[selectedCategory]) {
                    subCategories[selectedCategory].forEach(function (subCat) {
                        const option = document.createElement('option');
                        option.value = subCat;
                        option.textContent = subCat;
                        if (subCat === selectedSubCategory) {
                            option.selected = true;
                        }
                        subCategory.appendChild(option);
                    });
                }
            }

            // Sprawdzenie i ustawienie wartości początkowych
            const oldParentCategory = "{{ old('parent_category', $product->parent_category) }}";
            const oldSubCategory = "{{ old('sub_category', $product->sub_category) }}";

            if (oldParentCategory) {
                parentCategory.value = oldParentCategory;
                updateSubCategoryOptions(oldParentCategory, oldSubCategory);
            }

            // Obsługa zmiany kategorii nadrzędnej
            parentCategory.addEventListener('change', function () {
                updateSubCategoryOptions(this.value);
            });
        });
    </script>

</x-app-layout>
