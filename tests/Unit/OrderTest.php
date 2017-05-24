<?php

namespace Tests\Unit;

use App\Item;
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
        $item = factory(Item::class)->create([
            'name' => 'New Item'
        ]);

        factory(Order::class)->create([
            'user_id' => $user->id,
            'item_id' => $item->id,
            'type' => 'Sell',
            'price' => 500
        ]);

        $this->assertDatabaseHas('orders', [
            'user_id' => $user->id,
            'item_id' => $item->id,
            'type' => 'Sell',
            'price' => 500
        ]);
    }

    public function test_user_can_update_an_order()
    {
        $user = factory(User::class)->create();
        $item = factory(Item::class)->create([
            'name' => 'New Item'
        ]);

        $order = factory(Order::class)->create([
            'user_id' => $user->id,
            'item_id' => $item->id,
            'type' => 'Sell',
            'price' => 500
        ]);

        $order->update([
            'type' => 'Buy',
            'price' => 1000
        ]);

        $this->assertDatabaseHas('orders', [
            'type' => 'Buy',
            'price' => 1000
        ]);
    }
}
