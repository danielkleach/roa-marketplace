<?php

namespace Tests\Feature;

use App\Location;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LocationTest extends TestCase
{
    use DatabaseTransactions;

    public function test_user_can_view_all_locations()
    {
        $locations = factory(Location::class, 5)->create();

        $response = $this->get('/locations');

        $response->assertStatus(200);

        foreach ($locations as $location) {
            $response->assertSee($location->name);
        }
    }

    public function test_user_can_view_a_location()
    {
        $location = factory(Location::class)->create([
            'name' => 'New Location',
        ]);

        $response = $this->get('/locations/'.$location->id);

        $response->assertStatus(200);
        $response->assertSee('New Location');
    }
}
