<?php

namespace Tests\Unit;

use App\Item;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ItemTest extends TestCase
{
    use DatabaseTransactions;

    public function test_user_can_create_an_item()
    {
        factory(Item::class)->create([
            'name' => 'New Item',
            'description' => 'Type of wood.',
            'image' => '/materials/timber.png',
            'rarity' => 'Common'
        ]);

        $this->assertDatabaseHas('items', [
            'name' => 'New Item',
            'description' => 'Type of wood.',
            'image' => '/materials/timber.png',
            'rarity' => 'Common'
        ]);
    }

    public function test_user_can_update_an_item()
    {
        $item = factory(Item::class)->create([
            'name' => 'Old Item',
            'description' => 'Type of wood.',
            'image' => '/materials/timber.png',
            'rarity' => 'Common'
        ]);

        $item->update([
            'name' => 'New Item',
            'description' => 'Type of lumber.',
            'image' => '/materials/wood.png',
            'rarity' => 'Uncommon'
        ]);

        $this->assertDatabaseHas('items', [
            'name' => 'New Item',
            'description' => 'Type of lumber.',
            'image' => '/materials/wood.png',
            'rarity' => 'Uncommon'
        ]);
    }
}
