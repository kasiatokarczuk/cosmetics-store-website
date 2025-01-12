
<!-- Kontener na opinie z przewijaniem -->
<div id="opinions-container" class="h-screen overflow-y-auto p-6 bg-white shadow-lg rounded-lg">
    <!-- Nagłówek sekcji -->
    <h2 class="text-3xl font-semibold mb-6 text-center">Poznaj opinie naszych klientów</h2>
    <!-- Gwiazdki pod nagłówkiem -->
    <div class="flex justify-center mb-6">
        <span class="text-yellow-400 text-3xl">★ ★ ★ ★ ★</span>
    </div>
    <!-- Formularz dodawania opinii -->
    @auth
        <form method="POST" action="{{ route('opinions.store') }}" id="opinion-form" class="mb-8">
            @csrf
            <textarea
                name="content"
                id="content"
                class="w-full p-4 border border-gray-200 rounded-lg mb-4"
                placeholder="Dodaj swoją opinię"
                rows="2"></textarea>
            <button
                type="submit"
                class="w-full bg-pink-400 hover:bg-pink-600 text-white py-3 px-4 rounded-lg">
                Dodaj opinię
            </button>
        </form>
    @endauth
    <!-- Lista opinii -->
    <ul id="opinions-list">
        @foreach($opinions as $opinion)
            <li class="bg-gray-100 p-4 rounded-lg shadow mb-6" id="opinion-{{ $opinion->id }}">
                <div class="text-pink-500 font-bold text-lg">{{ $opinion->user->name }}</div>
                <div class="text-gray-700 mt-2 text-base">{{ $opinion->content }}</div>
            </li>
        @endforeach
    </ul>
</div>
<!-- JavaScript do dynamicznego dodawania nowej opinii -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let form = document.getElementById('opinion-form');
        if (!form.dataset.listenerAttached) {
            form.dataset.listenerAttached = true;  // Zapobiega wielokrotnemu dodaniu listenera
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                let formData = new FormData(form);
                fetch(form.action, {
                    method: form.method,
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': form.querySelector('[name=_token]').value
                    }
                }).then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok ' + response.statusText);
                    }
                    return response.json();
                }).then(data => {
                    // Tworzenie nowej opinii w HTML
                    let newOpinion = `
                    <li class="bg-gray-100 p-5 rounded-lg shadow mb-6" id="opinion-${data.id}">
                        <div class="text-pink-500 font-bold text-lg">${data.user_name}</div>
                        <div class="text-gray-700 mt-2 text-base">${data.content}</div>
                    </li>
                `;
                    // Dodaj nową opinię na górze listy
                    document.getElementById('opinions-list').insertAdjacentHTML('afterbegin', newOpinion);
                    // Wyczyść pole tekstowe po dodaniu opinii
                    form.querySelector('[name=content]').value = '';
                }).catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                });
            });
        }
    });
</script>
