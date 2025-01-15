<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * Wyświetl formularz do edycji produktów (tylko dla administratorów).
     *
     * @return View|RedirectResponse
     */
    public function createProduct(): View|RedirectResponse
    {
        $user = Auth::user();
        if ($user && $user->isAdmin()) {
            return view('products.create'); // Widok formularza dla admina
        }

        return Auth::check() ? redirect()->route('dashboard') : redirect()->route('login');
    }

    /**
     * Wyświetl formularz do edycji produktów (tylko dla administratorów).
     *
     * @return View|RedirectResponse
     */
    public function editProduct(): View|RedirectResponse
    {
        $user = Auth::user();
        if ($user && $user->isAdmin()) {
            return view('products.edit'); // Widok formularza dla admina
        }

        return Auth::check() ? redirect()->route('dashboard') : redirect()->route('login');
    }


    /**
     * Wyświetl formularz do edycji produktów (tylko dla administratorów).
     *
     * @return View|RedirectResponse
     */
    public function createAdvice(): View|RedirectResponse
    {
        $user = Auth::user();
        if ($user && $user->isAdmin()) {
            return view('Advices.create'); // Widok formularza dla admina
        }

        return Auth::check() ? redirect()->route('dashboard') : redirect()->route('login');
    }

    /**
     * Wyświetl formularz do edycji produktów (tylko dla administratorów).
     *
     * @return View|RedirectResponse
     */
    public function editAdvice(): View|RedirectResponse
    {
        $user = Auth::user();
        if ($user && $user->isAdmin()) {
            return view('Advices.edit'); // Widok formularza dla admina
        }
        return Auth::check() ? redirect()->route('dashboard') : redirect()->route('login');
    }
}
