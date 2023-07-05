<?php

namespace Tests\Feature;

use App\Models\Province;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProvinceTest extends TestCase
{
    use RefreshDatabase;

    public function test_search_province_all(): void
    {
        $user = User::factory()->create();
        $response = $this->withHeader('Accept', 'application/json')
            ->actingAs($user)
            ->get(route('search.provinces'));

        $response->assertStatus(200);
    }

    public function test_search_province_with_id(): void
    {
        $user = User::factory()->create();
        $province = Province::factory()->create();
        $response = $this->withHeader('Accept', 'application/json')
            ->actingAs($user)
            ->get(route('search.provinces'), [
                'id' => $province->id
            ]);

        $response->assertStatus(200);
    }
}
