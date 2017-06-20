<?php

namespace Tests\Feature;

use App\Location;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LocationTest extends TestCase
{
    use DatabaseTransactions;

    public function test_it_can_view_all_locations()
    {
        $user = factory(User::class)->create();

        $locations = factory(Location::class, 5)->create();

        $response = $this->actingAs($user)
            ->get('/locations');

        $response->assertStatus(200);

        foreach ($locations as $location) {
            $response->assertSee($location->name);
        }
    }

    public function test_it_can_view_a_location()
    {
        $user = factory(User::class)->create();

        $location = factory(Location::class)->create([
            'name' => 'New Location',
        ]);

        $response = $this->actingAs($user)
            ->get('/locations/'.$location->id);

        $response->assertStatus(200);
        $response->assertSee('New Location');
    }
}
