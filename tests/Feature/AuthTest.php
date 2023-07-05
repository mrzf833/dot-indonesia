<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_login_success(): void
    {
        $user = User::factory()->create();
        $response = $this->withHeader('Accept', 'application/json')
            ->post(route('auth.login'), [
                'email' => $user->email,
                'password' => 'password'
            ]);

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     */
    public function test_login_credentials_not_match(): void
    {
        $user = User::factory()->create();
        $response = $this->withHeader('Accept', 'application/json')
            ->post(route('auth.login'), [
                'email' => $user->email,
                'password' => 'passwordss'
            ]);

        $response->assertStatus(422);
    }

    public function test_register(): void
    {
        $response = $this->withHeader('Accept', 'application/json')
            ->post(route('auth.register'), [
                'name' => 'test name',
                'email' => 'test@app.com',
                'password' => 'password'
            ]);

        $response->assertStatus(200);
    }

    public function test_register_not_match(): void
    {
        $response = $this->withHeader('Accept', 'application/json')
            ->post(route('auth.register'), [
                'name' => 'test name',
            ]);

        $response->assertStatus(422);
    }

    public function test_user_success(): void
    {
        $user = User::factory()->create();
        $response = $this->withHeader('Accept', 'application/json')
            ->actingAs($user)
            ->get(route('auth.user'));

        $response->assertStatus(200);
    }

    public function test_user_not_login(): void
    {
        $response = $this->withHeader('Accept', 'application/json')
            ->get(route('auth.user'));

        $response->assertStatus(401);
    }

    public function test_logout_success(): void
    {
        $user = User::factory()->create();
        $response = $this->withHeader('Accept', 'application/json')
            ->actingAs($user)
            ->post(route('auth.logout'));

        $response->assertStatus(200);
    }

    public function test_logout_not_login(): void
    {
        $response = $this->withHeader('Accept', 'application/json')
            ->post(route('auth.logout'));

        $response->assertStatus(401);
    }
}
