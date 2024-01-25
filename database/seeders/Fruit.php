<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Fruit extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Fruit::factory()->create([
            'category_id' => 1,
            'name' => 'Fuji Apple',
            'unit' => 'kg',
            'price' => 10000
        ]);

        \App\Models\Fruit::factory()->create([
            'category_id' => 1,
            'name' => 'Red Apple',
            'unit' => 'kg',
            'price' => 15000
        ]);

        \App\Models\Fruit::factory()->create([
            'category_id' => 2,
            'name' => 'Vietnam Orange',
            'unit' => 'kg',
            'price' => 20000
        ]);

        \App\Models\Fruit::factory()->create([
            'category_id' => 2,
            'name' => 'Vietnam Big Orange',
            'unit' => 'kg',
            'price' => 22000
        ]);

        \App\Models\Fruit::factory()->create([
            'category_id' => 2,
            'name' => 'China Orange',
            'unit' => 'kg',
            'price' => 25000
        ]);

        \App\Models\Fruit::factory()->create([
            'category_id' => 2,
            'name' => 'China Big Orange',
            'unit' => 'kg',
            'price' => 24000
        ]);

        \App\Models\Fruit::factory()->create([
            'category_id' => 3,
            'name' => 'China Pear',
            'unit' => 'pack',
            'price' => 25000
        ]);

        \App\Models\Fruit::factory()->create([
            'category_id' => 3,
            'name' => 'Vietnam Pear',
            'unit' => 'pack',
            'price' => 29000
        ]);
    }
}
