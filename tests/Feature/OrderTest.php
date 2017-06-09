<?php

namespace Tests\Feature;

use App\Item;
use App\Location;
use App\Order;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OrderTest extends TestCase
{
    use DatabaseTransactions;

    public function test_user_can_view_all_orders()
    {
        $orders = factory(Order::class, 5)->create();

        $response = $this->get('/orders');

        $response->assertStatus(200);

        foreach ($orders as $order) {
            $response->assertSee($order->item->name);
            $response->assertSee($order->type);
            $response->assertSee((string) $order->quantity);
            $response->assertSee((string) $order->price);
        }
    }

    public function test_user_can_view_an_order()
    {
        $order = factory(Order::class)->create();

        $response = $this->get('/orders/'.$order->id);

        $response->assertStatus(200);

        $response->assertSee($order->item->name);
        $response->assertSee($order->type);
        $response->assertSee((string) $order->quantity);
        $response->assertSee((string) $order->price);
    }
}
