<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    public function testCreateCategory()
    {
        $user = \App\Models\User::first();
        $fakeName = fake()->name();
        $response = $this->actingAs($user)->post('/dashboard/category', [
            'name' => $fakeName,
        ]);

        $response->assertStatus(302)
                ->assertRedirect('/dashboard/category');
    }

    public function testCreateCategoryWithIncorrectName()
    {
        $user = \App\Models\User::first();
        $response = $this->actingAs($user)->post('/dashboard/category', [
            'name' => '',
        ]);

        $response->assertStatus(302)->assertSessionHasErrors(['name']);
    }
}
