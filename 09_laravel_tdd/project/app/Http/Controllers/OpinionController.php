<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opinion;
use App\Models\User; // Import the User model
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use App\Models\Product;
use App\Http\Controllers\ProductController;

class OpinionController extends Controller
{
    protected ProductController $productController;

    // Dependency Injection dla ProductController
    public function __construct(ProductController $productController)
    {
        $this->productController = $productController;
    }
    public function index(): View
    {
        $opinions = Opinion::with('user')->latest()->get();
        return view('opinions.index', compact('opinions'));
    }

    public function welcome(): View
    {
        $opinions = Opinion::with('user')->orderBy('created_at', 'desc')->get();
        return view('welcome', compact('opinions'));

    }

    public function dashboard(): View
    {
        $this->productController->updateWinterSale();

        $products = Product::latest()->take(3)->get();
        $opinions = Opinion::with('user')->orderBy('created_at', 'desc')->get();
        $winterSaleProducts = Product::whereNotNull('sale_price')->get();
        $newProducts = Product::inRandomOrder()->take(3)->pluck('id')->toArray();

        return view('dashboard', compact('products', 'opinions', 'winterSaleProducts', 'newProducts'));

    }
    public function store(Request $request): JsonResponse
    {
        $request->validate(['content' => 'required|string']);

        $opinion = new Opinion();
        if (!auth()->check()) {
            throw new \LogicException('Nie zalogowano użytkownika');
        }
        $opinion->user_id = (int) auth()->id();
        /** @var string $content */
        $content = $request->input('content');
        $opinion->content = $content;
        $opinion->save();

        /** @var User|null $user */
        $user = $opinion->user;

        $user_name = $user ? $user->name : 'Unknown User';

        return response()->json([
            'id' => $opinion->id,
            'user_name' => $user_name,
            'content' => $opinion->content
        ]);
    }
}
