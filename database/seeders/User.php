<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class User extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Staff 1',
            'user_code' => 'STF001',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Staff 2',
            'user_code' => 'STF002',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Staff 3',
            'user_code' => 'STF003',
        ]);
    }
}
