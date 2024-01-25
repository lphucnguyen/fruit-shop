<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testLoginWithIncorrectUserCode(): void
    {
        $response = $this->post('/login', [
            'user_code' => 'test',
            'password' => 'test',
            '_token' => csrf_token()
        ]);

        $response->assertStatus(302)->assertRedirect('/');
    }

    public function testLoginWithIncorrectPassword(): void
    {
        $response = $this->post('/login', [
            'user_code' => 'STF001',
            'password' => 'test',
            '_token' => csrf_token()
        ]);

        $response->assertStatus(302)->assertRedirect('/');
    }

    public function testLoginCorrect(): void
    {
        $response = $this->post('/login', [
            'user_code' => 'STF001',
            'password' => 'password',
            '_token' => csrf_token()
        ]);

        $response->assertStatus(302)->assertRedirect('/dashboard');
        $this->assertAuthenticated();
    }
}
