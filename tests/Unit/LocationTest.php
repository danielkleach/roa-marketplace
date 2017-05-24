<?php

namespace Tests\Unit;

use App\Location;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LocationTest extends TestCase
{
    use DatabaseTransactions;

    public function test_user_can_create_a_location()
    {
        factory(Location::class)->create([
            'name' => 'New Location',
        ]);

        $this->assertDatabaseHas('locations', [
            'name' => 'New Location',
        ]);
    }

    public function test_user_can_update_a_location()
    {
        $location = factory(Location::class)->create([
            'name' => 'Old Location',
        ]);

        $location->update([
            'name' => 'New Location',
        ]);

        $this->assertDatabaseHas('locations', [
            'name' => 'New Location',
        ]);
    }
}
