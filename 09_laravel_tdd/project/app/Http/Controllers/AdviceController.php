<?php

namespace App\Http\Controllers;

use App\Models\Advice;
use App\Http\Requests\StoreAdviceRequest;
use App\Http\Requests\UpdateAdviceRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdviceController extends Controller
{
    // Wyświetlanie listy poradników
    public function index(): View
    {
        // Pobieranie kategorii z zapytania GET
        $category = request('category');

        // Pobieranie poradników z opcjonalnym filtrowaniem według kategorii
        $advices = Advice::when($category, function ($query, $category) {
            return $query->where('category', $category);
        })->get();

        // Przekazywanie danych do widoku
        return view('Advices.index', compact('advices'));
    }

    // Formularz do tworzenia nowego poradnika
    public function create(): View
    {
        return view('Advices.create');
    }

    // Przechwycenie danych z formularza i zapisanie poradnika
    public function store(StoreAdviceRequest $request): RedirectResponse
    {
        // Zwalidowanie danych z formularza
        $validatedData = $request->validated(); // Pobranie zwalidowanych danych

        // Zapisz obrazek jeśli jest przesłany
        if ($request->hasFile('image') && $request->file('image') instanceof \Illuminate\Http\UploadedFile) {
            $validatedData['image'] = $request->file('image')->store('advices', 'public');
        }

        // Tworzymy nowy poradnik
        Advice::create($validatedData);

        return redirect()->route('Advices.create')->with('success', 'Poradnik został dodany.');
    }

    // Wyświetlanie szczegółów poradnika
    public function show(Advice $advice): View
    {
        return view('Advices.show', compact('advice'));
    }

    // Formularz do edytowania istniejącego poradnika
    public function edit(Advice $advice): View
    {
        return view('Advices.edit', compact('advice'));
    }

    // Aktualizacja danych poradnika
    public function update(UpdateAdviceRequest $request, Advice $advice): RedirectResponse
    {
        // Zwalidowanie danych z formularza i aktualizacja poradnika
        $advice->update($request->validated());

        return redirect()->route('Advices.show', $advice)->with('success', 'Poradnik został zaktualizowany.');
    }

    // Usunięcie poradnika
    public function destroy(Advice $advice): RedirectResponse
    {
        // Usuwamy poradnik
        $advice->delete();

        return redirect()->route('Advices.index')->with('success', 'Poradnik został usunięty.');
    }
}
