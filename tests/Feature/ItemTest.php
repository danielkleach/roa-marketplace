<?php

namespace Tests\Feature;

use App\Item;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ItemTest extends TestCase
{
    use DatabaseTransactions;

    public function test_user_can_view_all_items()
    {
        $items = factory(Item::class, 5)->create();

        $response = $this->get('/items');

        $response->assertStatus(200);

        foreach ($items as $item) {
            $response->assertSee($item->name);
            $response->assertSee($item->description);
            $response->assertSee($item->image);
            $response->assertSee($item->rarity);
        }
    }

    public function test_user_can_view_an_item()
    {
        $item = factory(Item::class)->create([
            'name' => 'New Item',
            'description' => 'Type of wood.',
            'image' => '/materials/timber.png',
            'rarity' => 'Common'
        ]);

        $response = $this->get('/items/'.$item->id);

        $response->assertStatus(200);
        $response->assertSee('New Item');
        $response->assertSee('Type of wood.');
        $response->assertSee('/materials/timber.png');
        $response->assertSee('Common');
    }
}
