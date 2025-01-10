<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            ['name' => 'John Doe', 'email' => 'john.doe@gmail.com', 'password' => bcrypt('secret')],
            ['name' => 'Janek ', 'email' => 'jane.smith@gmail.com', 'password' => bcrypt('secret')],
            ['name' => 'Katarzyna', 'email' => 'kasia@gmail.com', 'password' => bcrypt('secret')],
            ['name' => 'Dorota', 'email' => 'dorota12@gmail.com', 'password' => bcrypt('secret')],
            ['name' => 'Ania', 'email' => 'ania.jp@gmail.com', 'password' => bcrypt('secret')],
            ['name' => 'Karolina', 'email' => 'karo@gmail.com', 'password' => bcrypt('secret')],
            ['name' => 'Madzia', 'email' => 'madziak3@gmail.com', 'password' => bcrypt('secret')],
            ['name' => 'Basia', 'email' => 'barsia@gmail.com', 'password' => bcrypt('secret')],
            ['name' => 'Marysia', 'email' => 'mary@gmail.com', 'password' => bcrypt('secret')],
            ['name' => 'Zosia', 'email' => 'zocha@gmail.com', 'password' => bcrypt('secret')],
            ['name' => 'Wera', 'email' => 'wera@gmail.com', 'password' => bcrypt('secret')],

        ]);
    }
}
