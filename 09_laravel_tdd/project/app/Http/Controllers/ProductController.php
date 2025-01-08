<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function create(): View
    {
        return view('products.create');
    }

    public function store(Request $request): RedirectResponse
    {
        // Walidacja danych
        /** @var array<string, mixed> $validatedData */
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric|min:0',
            'parent_category' => 'nullable|string|max:255',
            'sub_category' => 'nullable|string|max:255',
            'quantity' => 'required|integer|min:0',
            'image' => 'nullable|image|max:2048',
        ]);

        // Jeśli obrazek istnieje, zapisujemy go
        if ($request->hasFile('image') && $request->file('image') instanceof \Illuminate\Http\UploadedFile) {
            $validatedData['image'] = $request->file('image')->store('products', 'public');
        }

        // Tworzenie produktu na podstawie zweryfikowanych danych
        // Make sure to pass an array, which $validatedData already is
        Product::create($validatedData);

        return redirect()->route('products.create')->with('success', 'Produkt został dodany.');
    }
}
