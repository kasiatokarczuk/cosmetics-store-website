<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center" style="font-size: 2rem; color: #ec4899;">
            {{ __('Szczegóły poradnika') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center">
                    <!-- Tytuł poradnika -->
                    <h1 class="font-bold mb-4" style="font-size: 3rem; color: #000;">
                        {{ $advice->title }}
                    </h1>

                    <!-- Kategoria -->
                    <p class="text-xl font-bold mb-4" style="color: #ec4899;">
                        Kategoria: {{ $advice->category }}
                    </p>

                    <!-- Szczegóły -->
                    <div class="mb-4 text-center">
                        <strong style="font-size: 1.25rem; color: #000;">Szczegóły:</strong>
                        <p class="mt-2" style="font-size: 1rem;">{{ $advice->content }}</p>
                    </div>

                    <!-- Obrazek -->
                    @if($advice->image)
                        <div class="mb-4">
                            <img src="{{ asset('advices_images/' . $advice->image) }}"
                                 alt="{{ $advice->title }}"
                                 style="width: 100%; max-height: 400px; object-fit: cover; border-radius: 10px;">
                        </div>
                    @endif

                    <!-- Przycisk Edytuj i Usuń -->
                    <div class="mt-4 flex justify-end space-x-4">
                        <!-- Przycisk Edytuj -->
                        <a href="{{ route('Advices.edit', $advice) }}"
                           style="background-color: #f9a8d4; color: white; padding: 0.5rem 1rem; border-radius: 5px; text-decoration: none;">
                            Edytuj
                        </a>

                        <!-- Przycisk Usuń -->
                        <form method="POST" action="{{ route('Advices.destroy', $advice) }}" onsubmit="return confirm('Jesteś pewny, że chcesz usunąć ten poradnik?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    style="background-color: #000; color: white; padding: 0.5rem 1rem; border-radius: 5px;">
                                Usuń
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

