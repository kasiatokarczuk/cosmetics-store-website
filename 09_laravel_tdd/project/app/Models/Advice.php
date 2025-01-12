<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advice extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'category',  // Kategoria poradnika (np. "Makijaż" lub "Pielęgnacja")
        'title',     // Tytuł poradnika
        'content',   // Treść poradnika
        'image',     // Ścieżka do zdjęcia poradnika (opcjonalnie)
    ];

}
