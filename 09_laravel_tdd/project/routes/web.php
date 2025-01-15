<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OpinionController;
use App\Http\Controllers\AdviceController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('books', BookController::class);

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::post('/cart/update/{id}/{action}', [CartController::class, 'updateCart'])->name('cart.update');



    Route::post('/advices', [AdviceController::class, 'store'])->name('Advices.store');
    Route::get('/advices/create', [AdviceController::class, 'create'])->name('Advices.create');
    Route::get('/advices/{advice}/edit', [AdviceController::class, 'edit'])->name('Advices.edit');
    Route::delete('/advices/{advice}', [AdviceController::class, 'destroy'])->name('Advices.destroy');
    Route::put('/advices/{advice}', [AdviceController::class, 'update'])->name('Advices.update');
    //Route::get('/poradniki', [AdviceController::class, 'poradniki'])->name('Advices.poradniki');

    Route::get('/favorites', [FavoritesController::class, 'index'])->name('favorites.index');
    Route::post('/favorites/add', [FavoritesController::class, 'add'])->name('favorites.add');
    Route::post('/favorites/remove', [FavoritesController::class, 'remove'])->name('favorites.remove');
    Route::post('/favorites/clear', [FavoritesController::class, 'clear'])->name('favorites.clear');



    Route::get('/products/create', [AdminController::class, 'createProduct'])->name('products.create');
    Route::get('/products/edit', [AdminController::class, 'editProduct'])->name('products.edit');

    Route::get('/advices/create', [AdminController::class, 'createAdvice'])->name('Advices.create');
    Route::get('/advices/{advice}', [AdminController::class, 'editAdvice'])->name('Advices.edit');

});

require __DIR__ . '/auth.php';

Route::get('/', [OpinionController::class, 'welcome'])->name('welcome');
//Route::get('/', [ProductController::class, 'showWelcome']);
Route::get('/', [ProductController::class, 'showWelcome'])->name('home');
Route::get('/opinions', [OpinionController::class, 'index'])->name('opinions.index');

Route::get('/dashboard', [OpinionController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribeToNewsletter'])->name('newsletter.subscribe');



Route::post('/opinions', [OpinionController::class, 'store'])->name('opinions.store');


Route::resource('/comments', CommentController::class);


Route::get('/products/makeup', [ProductController::class, 'makijaz'])->name('products.makeup');
Route::get('/products/care', [ProductController::class, 'pielegnacja'])->name('products.care');
Route::get('/products/makeup/eye', [ProductController::class, 'oko'])->name('products.eye');
Route::get('/products/makeup/face', [ProductController::class, 'twarz'])->name('products.face');
Route::get('/products/makeup/mouth', [ProductController::class, 'usta'])->name('products.mouth');
Route::get('/products/care/body', [ProductController::class, 'cialo'])->name('products.body');
Route::get('/products/care/hair', [ProductController::class, 'wlosy'])->name('products.hair');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::resource('/products', ProductController::class)->except(['create', 'edit']);

Route::get('/advices', [AdviceController::class, 'index'])->name('Advices.index');
Route::get('/advices/{advice}', [AdviceController::class, 'show'])->name('Advices.show');
