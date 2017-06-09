<?php

namespace Tests\Unit;

use App\Location;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LocationTest extends TestCase
{
    use DatabaseTransactions;

    public function test_user_can_create_a_location()
    {
        $user = factory(User::class)->create();

        $data = [
            'name' => 'New Location',
        ];

        $response = $this->actingAs($user)
            ->postJson("/locations", $data);

        $response->assertStatus(201);
        $this->assertDatabaseHas('locations', $data);
    }

    public function test_user_can_update_a_location()
    {
        $user = factory(User::class)->create();

        $location = factory(Location::class)->create([
            'name' => 'Old Location',
        ]);

        $data = [
            'name' => 'New Location',
        ];

        $response = $this->actingAs($user)
            ->patchJson("/locations/{$location->id}", $data);

        $response->assertStatus(200);
        $this->assertDatabaseHas('locations', $data);
    }
}
