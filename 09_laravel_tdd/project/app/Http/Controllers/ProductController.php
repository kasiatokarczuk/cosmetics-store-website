<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class ProductController extends Controller
{
    /**
     * @param Request $request
     * @param Builder<Product> $query
     * @return Builder<Product>
     */
    public function filterAndSort(Request $request, Builder $query): Builder
    {
        // Sprawdzenie, czy parametr "clear_filters" jest obecny
        if ($request->has('clear_filters')) {
            // Zwracamy niezmodfikowane zapytanie, czyli bez żadnych filtrów ani sortowania
            return $query->orderBy('created_at', 'desc');
        }

        // Pobieranie parametrów sortowania i filtrowania
        $sort = $request->input('sort', 'newest');
        $minPrice = $request->input('min_price', 0);
        $maxPrice = $request->input('max_price', null);

        // Filtr przedziału cenowego
        if ($minPrice !== null) {
            $query->where('price', '>=', $minPrice);
        }
        if ($maxPrice !== null) {
            $query->where('price', '<=', $maxPrice);
        }

        // Sortowanie
        switch ($sort) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            default: // Najnowsze
                $query->orderBy('created_at', 'desc');
                break;
        }

        return $query;
    }

    public function index(Request $request): View
    {
        $query = Product::query(); // Builder<Product>
        $products = $this->filterAndSort($request, $query)->get();
        $productCount = $products->count();

        return view('products.index', compact('products', 'productCount'));
    }

    public function makijaz(Request $request): View
    {
        $query = Product::where('parent_category', 'Makijaż'); // Builder<Product>
        $products = $this->filterAndSort($request, $query)->get();
        $productCount = $products->count();

        return view('products.index', compact('products', 'productCount'));
    }

    public function pielegnacja(Request $request): View
    {
        $query = Product::where('parent_category', 'Pielęgnacja'); // Builder<Product>
        $products = $this->filterAndSort($request, $query)->get();
        $productCount = $products->count();

        return view('products.index', compact('products', 'productCount'));
    }

    public function oko(Request $request): View
    {
        $query = Product::where('sub_category', 'Oko'); // Builder<Product>
        $products = $this->filterAndSort($request, $query)->get();
        $productCount = $products->count();

        return view('products.index', compact('products', 'productCount'));
    }

    public function twarz(Request $request): View
    {
        $query = Product::where('sub_category', 'Twarz'); // Builder<Product>
        $products = $this->filterAndSort($request, $query)->get();
        $productCount = $products->count();

        return view('products.index', compact('products', 'productCount'));
    }

    public function usta(Request $request): View
    {
        $query = Product::where('sub_category', 'Usta'); // Builder<Product>
        $products = $this->filterAndSort($request, $query)->get();
        $productCount = $products->count();

        return view('products.index', compact('products', 'productCount'));
    }

    public function cialo(Request $request): View
    {
        $query = Product::where('sub_category', 'Ciało'); // Builder<Product>
        $products = $this->filterAndSort($request, $query)->get();
        $productCount = $products->count();

        return view('products.index', compact('products', 'productCount'));
    }

    public function wlosy(Request $request): View
    {
        $query = Product::where('sub_category', 'Włosy'); // Builder<Product>
        $products = $this->filterAndSort($request, $query)->get();
        $productCount = $products->count();

        return view('products.index', compact('products', 'productCount'));
    }

    // Formularz do tworzenia nowego produktu
    public function create(): View
    {
        return view('products.create');
    }

    public function store(StoreProductsRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        // Obsługa przesyłania obrazka
        if ($request->hasFile('image')) {
            /** @var \Illuminate\Http\UploadedFile $image */
            $image = $request->file('image');
            $validatedData['image'] = $image->store('products', 'public');
        }

        Product::create($validatedData);

        return redirect()->route('products.create')->with('success', 'Produkt został dodany.');
    }

    public function show(Product $product): View
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product): View
    {
        return view('products.edit', compact('product'));
    }

    public function update(UpdateProductsRequest $request, Product $product): RedirectResponse
    {
        $product->update($request->validated());

        return redirect()->route('products.show', $product)->with('success', 'Produkt został zaktualizowany.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produkt został usunięty.');
    }
}
