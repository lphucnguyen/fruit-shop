<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Category extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Category::factory()->create([
            'name' => 'Apple'
        ]);

        \App\Models\Category::factory()->create([
            'name' => 'Orange'
        ]);

        \App\Models\Category::factory()->create([
            'name' => 'Pear'
        ]);
    }
}
