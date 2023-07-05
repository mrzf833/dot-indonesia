<?php

namespace Tests\Feature;

use App\Models\City;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CityTest extends TestCase
{
    use RefreshDatabase;

    public function test_search_city_all(): void
    {
        $user = User::factory()->create();
        $response = $this->withHeader('Accept', 'application/json')
            ->actingAs($user)
            ->get(route('search.city'));

        $response->assertStatus(200);
    }

    public function test_search_city_with_id(): void
    {
        $user = User::factory()->create();
        $city = City::factory()->create();
        $response = $this->withHeader('Accept', 'application/json')
            ->actingAs($user)
            ->get(route('search.city'), [
                'id' => $city->id
            ]);

        $response->assertStatus(200);
    }
}
