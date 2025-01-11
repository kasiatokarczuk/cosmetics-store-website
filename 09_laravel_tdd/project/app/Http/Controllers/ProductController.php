<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller
{
    // Wyświetlanie listy produktów
    public function index(): View
    {
        // Pobieramy wszystkie produkty i przekazujemy do widoku
        //$products = Product::all();
        //return view('products.index', compact('products'));

        return view('products.index')->with('products', Product::all());
    }

    public function makijaz(): View
    {
        $products = Product::where('parent_category', 'Makijaż')->get();
        return view('products.index', compact('products'));
    }

    public function oko(): View
    {
        $products = Product::where('sub_category', 'Oko')->get();
        return view('products.index', compact('products'));
    }

    public function twarz(): View
    {
        $products = Product::where('sub_category', 'Twarz')->get();
        return view('products.index', compact('products'));
    }

    public function usta(): View
    {
        $products = Product::where('sub_category', 'Usta')->get();
        return view('products.index', compact('products'));
    }

    public function pielegnacja(): View
    {
        $products = Product::where('parent_category', 'Pielęgnacja')->get();
        return view('products.index', compact('products'));
    }

    public function cialo(): View
    {
        $products = Product::where('sub_category', 'Ciało')->get();
        return view('products.index', compact('products'));
    }
    public function wlosy(): View
    {
        $products = Product::where('sub_category', 'Włosy')->get();
        return view('products.index', compact('products'));
    }

    // Formularz do tworzenia nowego produktu
    public function create(): View
    {
        return view('products.create');
    }

    // Przechwycenie danych z formularza i zapisanie produktu
    public function store(StoreProductsRequest $request): RedirectResponse
    {
        // Zwalidowanie danych z formularza
        $validatedData = $request->validated(); // Pobranie zwalidowanych danych

        // Zapisz obrazek jeśli jest przesłany
        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('products', 'public');
        }

        // Tworzymy nowy produkt
        Product::create($validatedData);

        return redirect()->route('products.create')->with('success', 'Produkt został dodany.');
    }

    // Wyświetlanie szczegółów produktu
    public function show(Product $product): View
    {
        return view('products.show', compact('product'));
    }

    // Formularz do edytowania istniejącego produktu
    public function edit(Product $product): View
    {
        return view('products.edit', compact('product'));
    }

    // Aktualizacja danych produktu
    public function update(UpdateProductsRequest $request, Product $product): RedirectResponse
    {
        // Zwalidowanie danych z formularza i aktualizacja produktu
        $product->update($request->validated());

        return redirect()->route('products.show', $product)->with('success', 'Produkt został zaktualizowany.');
    }

    // Usunięcie produktu
    public function destroy(Product $product): RedirectResponse
    {
        // Usuwamy produkt
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produkt został usunięty.');
    }
}
