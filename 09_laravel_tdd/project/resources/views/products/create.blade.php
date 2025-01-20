<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dodaj nowy produkt') }}
        </h2>
    </x-slot>
    <!-- Alert sukcesu -->
    @if (session('success'))
        <div id="success-alert"  class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert" style="background-color: #adddaa; color: #244522">
            <strong class="font-bold">Sukces!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
            <button id="close-alert" type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <title>Zamknij</title>
                    <path d="M14.348 5.652a1 1 0 00-1.414 0L10 8.586 7.066 5.652a1 1 0 10-1.414 1.414L8.586 10l-2.934 2.934a1 1 0 101.414 1.414L10 11.414l2.934 2.934a1 1 0 001.414-1.414L11.414 10l2.934-2.934a1 1 0 000-1.414z"></path>
                </svg>
            </button>
        </div>
    @endif
    <div class="py-12">
        <a href="{{ route('products.index') }}" class="btn-all" style="
            display: inline-block;
            background-color: rgb(115,115,115);
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin-left: 20px;
        ">Zobacz wszystkie produkty</a>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Nazwa produktu -->
                        <div>
                            <x-input-label for="name" :value="__('Nazwa produktu')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                          :value="old('name')" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Cena -->
                        <div class="mt-4">
                            <x-input-label for="price" :value="__('Cena')" />
                            <x-text-input id="price" class="block mt-1 w-full" type="number" step="0.01" name="price"
                                          :value="old('price')" />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>

                        <!-- Kategoria nadrzędna -->
                        <div class="mt-4">
                            <x-input-label for="parent_category" :value="__('Kategoria nadrzędna')" />
                            <select id="parent_category" name="parent_category" class="block mt-1 w-full">
                                <option value="" disabled selected>Wybierz kategorię nadrzędną</option>
                                <option value="Makijaż" {{ old('parent_category') === 'Makijaż' ? 'selected' : '' }}>Makijaż</option>
                                <option value="Pielęgnacja" {{ old('parent_category') === 'Pielęgnacja' ? 'selected' : '' }}>Pielęgnacja</option>
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
                                          :value="old('quantity')"  />
                            <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                        </div>

                        <!-- Zdjęcie produktu -->
                        <div class="mt-4">
                            <x-input-label for="image" :value="__('Zdjęcie produktu')" />
                            <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" />
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>

                        <!-- Opis produktu -->
                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Opis produktu')" />
                            <textarea id="description" name="description" class="block mt-1 w-full" rows="4">{{ old('description') }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Dodaj produkt') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const closeAlertButton = document.getElementById('close-alert');
            const successAlert = document.getElementById('success-alert');

            // Obsługa zamykania alertu
            if (closeAlertButton && successAlert) {
                closeAlertButton.addEventListener('click', function () {
                    successAlert.style.display = 'none';
                });
            }

            // Obsługa kategorii podrzędnych
            const parentCategory = document.getElementById('parent_category');
            const subCategory = document.getElementById('sub_category');
            const subCategories = {
                'Makijaż': ['Oko', 'Twarz', 'Usta'],
                'Pielęgnacja': ['Ciało', 'Włosy']
            };

            parentCategory.addEventListener('change', function () {
                const selectedCategory = this.value;
                subCategory.innerHTML = '<option value="" disabled selected>Wybierz kategorię podrzędną</option>';

                if (subCategories[selectedCategory]) {
                    subCategories[selectedCategory].forEach(function (subCat) {
                        const option = document.createElement('option');
                        option.value = subCat;
                        option.textContent = subCat;
                        subCategory.appendChild(option);
                    });
                }
            });

            const oldParentCategory = "{{ old('parent_category') }}";
            const oldSubCategory = "{{ old('sub_category') }}";
            if (oldParentCategory) {
                parentCategory.value = oldParentCategory;
                parentCategory.dispatchEvent(new Event('change'));

                setTimeout(() => {
                    subCategory.value = oldSubCategory;
                }, 100);
            }
        });
    </script>
</x-app-layout>
