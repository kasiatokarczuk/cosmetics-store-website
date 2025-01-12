<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dodaj nowy poradnik') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('Advices.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Title -->
                        <div class="mb-4">
                            <x-input-label for="title" :value="__('Tytuł')" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" value="{{ old('title') }}" required autofocus />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <!-- Category -->
                        <div class="mb-4">
                            <x-input-label for="category" :value="__('Kategoria')" />
                            <select id="category" name="category" class="mt-1 block w-full rounded-md border-gray-300" required>
                                <option value="" disabled {{ old('category') ? '' : 'selected' }}>-- {{ __('Select a category') }} --</option>
                                <option value="makijaż" {{ old('category') === 'makijaż' ? 'selected' : '' }}>{{ __('makijaż') }}</option>
                                <option value="pielęgnacja" {{ old('category') === 'pielęgnacja' ? 'selected' : '' }}>{{ __('pielęgnacja') }}</option>
                            </select>
                            <x-input-error :messages="$errors->get('category')" class="mt-2" />
                        </div>

                        <!-- Content -->
                        <div class="mb-4">
                            <x-input-label for="content" :value="__('Opis')" />
                            <textarea id="content" name="content" class="mt-1 block w-full rounded-md border-gray-300" rows="5" required>{{ old('content') }}</textarea>
                            <x-input-error :messages="$errors->get('content')" class="mt-2" />
                        </div>

                        <!-- Image -->
                        <div class="mb-4">
                            <x-input-label for="image" :value="__('Zdjęcie')" />
                            <input id="image" name="image" type="file" class="block mt-1 w-full">
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>

                        <x-primary-button class="mt-4">
                            {{ __('Dodaj poradnik') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
