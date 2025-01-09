<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Product 1',
            'price' => 79.00,
            'parent_category' => 'Pielęgnacja',
            'sub_category' => 'Ciało',
            'quantity' => 50,
            'image' => 'kosmetyk.jpg',
            'description' => 'Description for Product ',
        ]);

        Product::create([
            'name' => 'Product 2',
            'price' => 30.00,
            'parent_category' => 'Pielęgnacja',
            'sub_category' => 'Włosy',
            'quantity' => 40,
            'image' => 'kosmetyk.jpg',
            'description' => 'Description for Product ',
        ]);

        Product::create([
            'name' => 'Product 3',
            'price' => 60.00,
            'parent_category' => 'Pielęgnacja',
            'sub_category' => 'Włosy',
            'quantity' => 20,
            'image' => 'kosmetyk.jpg',
            'description' => 'Description for Product ',
        ]);

        Product::create([
            'name' => 'Product 4',
            'price' => 100.00,
            'parent_category' => 'Pielęgnacja',
            'sub_category' => 'Włosy',
            'quantity' => 70,
            'image' => 'kosmetyk.jpg',
            'description' => 'Description for Product ',
        ]);

        Product::create([
            'name' => 'Product 5',
            'price' => 65.00,
            'parent_category' => 'Pielęgnacja',
            'sub_category' => 'Ciało',
            'quantity' => 55,
            'image' => 'kosmetyk.jpg',
            'description' => 'Description for Product ',
        ]);

        Product::create([
            'name' => 'Product 6',
            'price' => 80.00,
            'parent_category' => 'Pielęgnacja',
            'sub_category' => 'Ciało',
            'quantity' => 50,
            'image' => 'kosmetyk.jpg',
            'description' => 'Description for Product ',
        ]);

        Product::create([
            'name' => 'Product 7',
            'price' => 140.00,
            'parent_category' => 'Makijaż',
            'sub_category' => 'Usta',
            'quantity' => 30,
            'image' => 'kosmetyk.jpg',
            'description' => 'Description for Product ',
        ]);

        Product::create([
            'name' => 'Product 8',
            'price' => 80.00,
            'parent_category' => 'Makijaż',
            'sub_category' => 'Usta',
            'quantity' => 90,
            'image' => 'kosmetyk.jpg',
            'description' => 'Description for Product ',
        ]);

        Product::create([
            'name' => 'Product 9',
            'price' => 50.00,
            'parent_category' => 'Makijaż',
            'sub_category' => 'Oko',
            'quantity' => 60,
            'image' => 'kosmetyk.jpg',
            'description' => 'Description for Product ',
        ]);

        Product::create([
            'name' => 'Product 10',
            'price' => 120.00,
            'parent_category' => 'Makijaż',
            'sub_category' => 'Twarz',
            'quantity' => 36,
            'image' => 'kosmetyk.jpg',
            'description' => 'Description for Product ',
        ]);

        Product::create([
            'name' => 'Product 11',
            'price' => 230.00,
            'parent_category' => 'Makijaż',
            'sub_category' => 'Twarz',
            'quantity' => 30,
            'image' => 'kosmetyk.jpg',
            'description' => 'Description for Product ',
        ]);

        Product::create([
            'name' => 'Product 12',
            'price' => 70.00,
            'parent_category' => 'Makijaż',
            'sub_category' => 'Oko',
            'quantity' => 47,
            'image' => 'kosmetyk.jpg',
            'description' => 'Description for Product ',
        ]);
    }


}
