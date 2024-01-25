<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Dflydev\DotAccessData\Data;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DatabaseSeeder::call([
            User::class,
            Category::class,
            Fruit::class
        ]);
    }
}
