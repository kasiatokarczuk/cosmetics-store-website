<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OpinionController;
use App\Http\Controllers\AdviceController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('books', BookController::class);
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

    Route::get('/products/makeup', [ProductController::class, 'makijaz'])->name('products.makeup');
    Route::get('/products/care', [ProductController::class, 'pielegnacja'])->name('products.care');
    Route::get('/products/makeup/eye', [ProductController::class, 'oko'])->name('products.eye');
    Route::get('/products/makeup/face', [ProductController::class, 'twarz'])->name('products.face');
    Route::get('/products/makeup/mouth', [ProductController::class, 'usta'])->name('products.mouth');
    Route::get('/products/care/body', [ProductController::class, 'cialo'])->name('products.body');
    Route::get('/products/care/hair', [ProductController::class, 'wlosy'])->name('products.hair');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');

    Route::resource('/products', ProductController::class);
    //Route::post('/products', [ProductController::class, 'store'])->name('products.store');

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

    Route::get('/advices/create', [AdviceController::class, 'create'])->name('Advices.create');
    Route::post('/advices', [AdviceController::class, 'store'])->name('Advices.store');
    Route::get('/advices', [AdviceController::class, 'index'])->name('Advices.index');
    Route::get('/advices/{advice}', [AdviceController::class, 'show'])->name('Advices.show');
    Route::get('/advices/{advice}/edit', [AdviceController::class, 'edit'])->name('Advices.edit');
    Route::delete('/advices/{advice}', [AdviceController::class, 'destroy'])->name('Advices.destroy');
    Route::put('/advices/{advice}', [AdviceController::class, 'update'])->name('Advices.update');
});

require __DIR__ . '/auth.php';

Route::get('/', [OpinionController::class, 'welcome'])->name('welcome');
Route::get('/opinions', [OpinionController::class, 'index'])->name('opinions.index');
Route::get('/dashboard', [OpinionController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');
Route::post('/opinions', [OpinionController::class, 'store'])->name('opinions.store');

Route::resource('/comments', CommentController::class);

