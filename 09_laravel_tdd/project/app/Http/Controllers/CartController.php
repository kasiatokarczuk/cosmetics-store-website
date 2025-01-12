<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    /**
     * Wyświetlenie koszyka.
     *
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        $cart = session()->get('cart', []);
        if (!is_array($cart)) {
            $cart = [];
        }

        $total = array_reduce($cart, function (float $sum, mixed $item): float {
            if (is_array($item)) {
                $quantity = isset($item['quantity']) && is_numeric($item['quantity']) ? (float)$item['quantity'] : 0.0;
                $price = isset($item['price']) && is_numeric($item['price']) ? (float)$item['price'] : 0.0;
                return $sum + ($quantity * $price);
            }
            return $sum;
        }, 0.0);

        $cartCount = array_sum(array_column($cart, 'quantity') ?: []);

        return view('cart.index', compact('cart', 'total', 'cartCount'));
    }

    /**
     * Dodanie produktu do koszyka.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        /** @var Product|null $product */
        $product = Product::find($request->product_id);
        if (!$product) {
            return redirect()->route('cart.index')->withErrors('Produkt nie został znaleziony.');
        }

        $cart = session()->get('cart', []);
        if (!is_array($cart)) {
            $cart = [];
        }

        if (isset($cart[$product->id]) && is_array($cart[$product->id])) {
            $currentQuantity = isset($cart[$product->id]['quantity']) && is_numeric($cart[$product->id]['quantity'])
                ? (int) $cart[$product->id]['quantity']
                : 0;

            $requestQuantity = is_numeric($request->quantity) ? (int) $request->quantity : 0;

            $cart[$product->id]['quantity'] = $currentQuantity + $requestQuantity;
        } else {
            $requestQuantity = is_numeric($request->quantity) ? (int) $request->quantity : 0;

            $cart[$product->id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $requestQuantity,
                'image' => $product->image,
            ];
        }

        session()->put('cart', $cart);

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Produkt dodany do koszyka',
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Produkt dodany do koszyka!');
    }

    /**
     * Usunięcie produktu z koszyka.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'product_id' => 'required|integer',
        ]);

        $cart = session()->get('cart', []);
        if (!is_array($cart)) {
            $cart = [];
        }

        if (isset($cart[$request->product_id])) {
            unset($cart[$request->product_id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Produkt usunięty z koszyka!');
    }

    /**
     * Wyczyść koszyk.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function clear(): \Illuminate\Http\RedirectResponse
    {
        session()->forget('cart');
        return redirect()->route('cart.index')->with('success', 'Koszyk został wyczyszczony!');
    }

    /**
     * Aktualizacja ilości produktów w koszyku.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @param string $action
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateCart(Request $request, int $id, string $action): \Illuminate\Http\RedirectResponse
    {
        $cart = session()->get('cart', []);

        if (!is_array($cart)) {
            $cart = [];
        }

        if (isset($cart[$id]) && is_array($cart[$id])) {
            $quantity = isset($cart[$id]['quantity']) && is_numeric($cart[$id]['quantity'])
                ? (int) $cart[$id]['quantity']
                : 0;

            $cart[$id]['quantity'] = $quantity;

            if ($action == 'increase') {
                $cart[$id]['quantity']++;
            } elseif ($action == 'decrease' && $cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity']--;
            }
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index');
    }
}
