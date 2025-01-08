<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // ID produktu
            $table->string('name'); // Nazwa produktu
            $table->decimal('price', 10, 2); // Cena produktu
            $table->string('parent_category'); // Kategoria nadrzędna
            $table->string('sub_category'); // Kategoria podrzędna
            $table->integer('quantity'); // Liczba sztuk
            $table->timestamps(); // Kolumny created_at i updated_at
            $table->string('image');// Kolumna dla zdjęcia

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
