<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // Wyświetlenie koszyka
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = array_reduce($cart, function ($sum, $item) {
            return $sum + $item['quantity'] * $item['price'];
        }, 0);

        return view('cart.index', compact('cart', 'total'));
    }

    // Dodanie produktu do koszyka
    public function add(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $request->quantity;
        } else {
            $cart[$product->id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $request->quantity,
                'image' => $product->image,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Produkt dodany do koszyka!');
    }

    // Usunięcie produktu z koszyka
    public function remove(Request $request)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$request->product_id])) {
            unset($cart[$request->product_id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Produkt usunięty z koszyka!');
    }

    // Wyczyść koszyk
    public function clear()
    {
        session()->forget('cart');
        return redirect()->route('cart.index')->with('success', 'Koszyk został wyczyszczony!');
    }
}
