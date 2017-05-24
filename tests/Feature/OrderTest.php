<?php

namespace Tests\Feature;

use App\Item;
use App\Order;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OrderTest extends TestCase
{
    use DatabaseTransactions;

    public function test_user_can_view_all_orders()
    {
        $item = factory(Item::class)->create([
            'name' => 'New Item'
        ]);

        $orders = factory(Order::class, 5)->create([
            'item_id' => $item->id
        ]);

        $response = $this->get('/orders');

        $response->assertStatus(200);

        foreach ($orders as $order) {
            $response->assertSee($order->item->name);
            $response->assertSee($order->type);
            $response->assertSee((string) $order->price);
        }
    }

    public function test_user_can_view_an_order()
    {
        $item = factory(Item::class)->create([
            'name' => 'New Item'
        ]);

        $order = factory(Order::class)->create([
                'item_id' => $item->id,
                'type' => 'Buy',
                'price' => 200
            ]);

        $response = $this->get('/orders/'.$order->id);

        $response->assertStatus(200);
        $response->assertSee($item->name);
        $response->assertSee($order->type);
        $response->assertSee((string) $order->price);
    }
}
