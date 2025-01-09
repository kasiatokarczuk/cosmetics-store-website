<x-app-layout>
    <div class="container mt-5">
        <h2>Twój koszyk</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (count($cart) > 0)
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Produkt</th>
                    <th>Ilość</th>
                    <th>Cena jednostkowa</th>
                    <th>Suma</th>
                    <th>Akcje</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($cart as $id => $item)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" style="width: 50px;">
                            {{ $item['name'] }}
                        </td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>{{ $item['price'] }} zł</td>
                        <td>{{ $item['quantity'] * $item['price'] }} zł</td>
                        <td>
                            <form action="{{ route('cart.remove') }}" method="POST" style="display: inline;">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $id }}">
                                <button type="submit" class="btn btn-danger btn-sm">Usuń</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <h4>Łączna suma: {{ $total }} zł</h4>
            <form action="{{ route('cart.clear') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-warning">Wyczyść koszyk</button>
            </form>
        @else
            <p>Twój koszyk jest pusty.</p>
        @endif
    </div>
</x-app-layout>
