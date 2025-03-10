<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\OpinionController;

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
    public function showWelcome(): View
    {

        $this->updateWinterSale();

        $products = Product::latest()->take(3)->get();
        $winterSaleProducts = Product::whereNotNull('sale_price')->get();

        return view('welcome', compact('products', 'winterSaleProducts'));
    }


    public function updateWinterSale(): RedirectResponse
    {
        // Resetuj sale_price dla wszystkich produktów
        Product::query()->update(['sale_price' => null]);

        // Losuj 3 produkty
        $products = Product::inRandomOrder()->take(3)->get();

        foreach ($products as $product) {
            // Obniż cenę o 20%
            $product->sale_price = $product->price * 0.8;
            $product->save();
        }

        // Zapisz te produkty w cache (opcjonalne)
        Cache::put('winter_sale_products', $products, now()->addHour());

        // Przekierowanie z komunikatem
        return redirect()->route('home')->with('success', 'Winter sale updated successfully');
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

            $uniqueFileName = uniqid() . '_' . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('images');
            $image->move($destinationPath, $uniqueFileName);

            $validatedData['image'] = $uniqueFileName;
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
        // Usuń obrazek z katalogu, jeśli istnieje
        if ($product->image && file_exists(public_path('images/' . $product->image))) {
            unlink(public_path('images/' . $product->image));
        }
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produkt został usunięty.');
    }
}
