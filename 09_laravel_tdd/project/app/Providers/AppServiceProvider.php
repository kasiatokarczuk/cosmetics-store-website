<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\View\View;
use App\Models\Product;
use Illuminate\Support\Facades\View as ViewFacade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view) {
            if ($view instanceof View) {
                // Pobranie koszyka z sesji
                $cart = session()->get('cart', []);
                if (is_array($cart)) {
                    $cartCount = array_sum(array_column($cart, 'quantity'));
                } else {
                    $cartCount = 0;
                }

                // Pobranie ulubionych z sesji
                $favorites = session()->get('favorites', []);
                if (is_array($favorites)) {
                    $favoritesCount = count($favorites);
                } else {
                    $favoritesCount = 0;
                }

                // Przekazanie liczby produktów w koszyku do widoku
                $view->with('cartCount', $cartCount)
                    ->with('favoritesCount', $favoritesCount);
            }
        });
        // Udostępnij zmienną dla widoków
        ViewFacade::composer('*', function (View $view) {
            $newProducts = Product::latest()->take(3)->pluck('id')->toArray();
            $view->with('newProducts', $newProducts);
        });
    }
}
