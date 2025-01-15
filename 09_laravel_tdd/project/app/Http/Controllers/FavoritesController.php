<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class FavoritesController extends Controller
{
    /**
     * Wyświetlenie listy ulubionych produktów.
     *
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        $favorites = session()->get('favorites', []);
        if (!is_array($favorites)) {
            $favorites = [];
        }

        $favoritesCount = count($favorites);

        return view('favorites.index', compact('favorites', 'favoritesCount'));
    }

    /**
     * Dodanie produktu do ulubionych.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
        ]);

        /** @var Product|null $product */
        $product = Product::find($request->product_id);
        if (!$product) {
            return redirect()->back()->withErrors('Produkt nie został znaleziony.');
        }

        $favorites = session()->get('favorites', []);
        if (!is_array($favorites)) {
            $favorites = [];
        }

        $favorites[$product->id] = [
            'name' => $product->name,
            'price' => $product->price,
            'image' => $product->image,
        ];

        session()->put('favorites', $favorites);

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Produkt dodany do ulubionych.',
            ]);
        }

        return redirect()->back()->with('success', 'Produkt dodany do ulubionych.');
    }

    /**
     * Usunięcie produktu z ulubionych.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'product_id' => 'required|integer',
        ]);

        $favorites = session()->get('favorites', []);
        if (!is_array($favorites)) {
            $favorites = [];
        }

        if (isset($favorites[$request->product_id])) {
            unset($favorites[$request->product_id]);
            session()->put('favorites', $favorites);
        }

        return redirect()->route('favorites.index')->with('success', 'Produkt usunięty z ulubionych.');
    }

    /**
     * Wyczyść listę ulubionych.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function clear(): \Illuminate\Http\RedirectResponse
    {
        session()->forget('favorites');
        return redirect()->route('favorites.index')->with('success', 'Ulubione zostały wyczyszczone!');
    }

}
