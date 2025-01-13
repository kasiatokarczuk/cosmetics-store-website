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
            ['name' => 'Administrator', 'email' => 'admin@gmail.com', 'password' => bcrypt('admin'), 'role' => 'admin'],
            ['name' => 'John Doe', 'email' => 'john.doe@gmail.com', 'password' => bcrypt('secret'), 'role' => 'user'],
            ['name' => 'Janek', 'email' => 'jane.smith@gmail.com', 'password' => bcrypt('secret'), 'role' => 'user'],
            ['name' => 'Katarzyna', 'email' => 'kasia@gmail.com', 'password' => bcrypt('secret'), 'role' => 'user'],
            ['name' => 'Dorota', 'email' => 'dorota12@gmail.com', 'password' => bcrypt('secret'), 'role' => 'user'],
            ['name' => 'Ania', 'email' => 'ania.jp@gmail.com', 'password' => bcrypt('secret'), 'role' => 'user'],
            ['name' => 'Karolina', 'email' => 'karo@gmail.com', 'password' => bcrypt('secret'), 'role' => 'user'],
            ['name' => 'Madzia', 'email' => 'madziak3@gmail.com', 'password' => bcrypt('secret'), 'role' => 'user'],
            ['name' => 'Basia', 'email' => 'barsia@gmail.com', 'password' => bcrypt('secret'), 'role' => 'user'],
            ['name' => 'Marysia', 'email' => 'mary@gmail.com', 'password' => bcrypt('secret'), 'role' => 'user'],
            ['name' => 'Zosia', 'email' => 'zocha@gmail.com', 'password' => bcrypt('secret'), 'role' => 'user'],
            ['name' => 'Wera', 'email' => 'wera@gmail.com', 'password' => bcrypt('secret'), 'role' => 'user'],
        ]);
    }
}
