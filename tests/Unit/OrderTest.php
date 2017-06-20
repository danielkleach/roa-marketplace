<?php

namespace Tests\Unit;

use App\Item;
use App\Location;
use App\Order;
use App\User;
use App\Profile;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OrderTest extends TestCase
{
    use DatabaseTransactions;

    public function test_user_can_create_an_order()
    {
        $user = factory(User::class)->create();
        $item = factory(Item::class)->create();
        $location = factory(Location::class)->create();

        $data = [
            'user_id' => $user->id,
            'item_id' => $item->id,
            'location_id' => $location->id,
            'type' => 'Sell',
            'quantity' => 20,
            'price' => 500,
            'start_date' => Carbon::now()->toDateTimeString(),
            'end_date' => Carbon::now()->addDays(3)->toDateTimeString()
        ];

        $response = $this->actingAs($user)
            ->postJson("/orders", $data);

        $response->assertStatus(302);
        $this->assertDatabaseHas('orders', $data);
    }

    public function test_user_can_update_an_order()
    {
        $user = factory(User::class)->create();
        $item = factory(Item::class)->create();
        $location = factory(Location::class)->create();

        $order = factory(Order::class)->create([
            'user_id' => $user->id,
            'item_id' => $item->id,
            'location_id' => $location->id,
            'type' => 'Sell',
            'quantity' => 20,
            'price' => 500
        ]);

        $data = [
            'type' => 'Buy',
            'quantity' => 10,
            'price' => 1000
        ];

        $response = $this->actingAs($user)
            ->patchJson("/orders/{$order->id}", $data);

        $response->assertStatus(200);
        $this->assertDatabaseHas('orders', $data);
    }

    public function test_it_can_set_date_attributes()
    {
        $order = factory(Order::class)->create([
            'start_date' => Carbon::now()->subDays(5)->toDateTimeString(),
            'end_date' => Carbon::now()->subDays(3)->toDateTimeString()
        ]);

        $this->assertEquals('5 days ago', $order->start_date);
        $this->assertEquals('3 days ago', $order->end_date);
    }
}
