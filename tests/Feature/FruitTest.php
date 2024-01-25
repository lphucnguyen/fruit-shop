<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FruitTest extends TestCase
{
    public function testCreateFruitCorrectInput()
    {
        $user = \App\Models\User::first();
        $category = \App\Models\Category::first();
        $response = $this->actingAs($user)->post('/dashboard/fruit', [
            'name' => fake()->name(),
            'unit' => 'kg',
            'price' => 10000,
            'category_id' => $category->id,
        ]);

        $response->assertStatus(302)->assertRedirect('/dashboard/fruit');
    }

    public function testCreateFruitIncorrectName()
    {
        $user = \App\Models\User::first();
        $category = \App\Models\Category::first();
        $response = $this->actingAs($user)->post('/dashboard/fruit', [
            'name' => '',
            'unit' => 'kg',
            'price' => 10000,
            'category_id' => $category->id,
        ]);

        $response->assertStatus(302)->assertSessionHasErrors(['name']);
    }

    public function testCreateFruitIncorrectPrice()
    {
        $user = \App\Models\User::first();
        $category = \App\Models\Category::first();
        $response = $this->actingAs($user)->post('/dashboard/fruit', [
            'name' => fake()->name(),
            'unit' => 'kg',
            'price' => 0,
            'category_id' => $category->id,
        ]);

        $response->assertStatus(302)->assertSessionHasErrors(['price']);
    }
}
