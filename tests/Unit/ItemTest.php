<?php

namespace Tests\Unit;

use App\Item;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ItemTest extends TestCase
{
    use DatabaseTransactions;

    public function test_user_can_create_an_item()
    {
        $user = factory(User::class)->create();

        $data = [
            'name' => 'New Item',
            'description' => 'Type of wood.',
            'image' => '/materials/timber.png',
            'rarity' => 'Common'
        ];

        $response = $this->actingAs($user)
            ->postJson("/items", $data);

        $response->assertStatus(201);
        $this->assertDatabaseHas('items', $data);
    }

    public function test_user_can_update_an_item()
    {
        $user = factory(User::class)->create();

        $item = factory(Item::class)->create([
            'name' => 'Old Item',
            'description' => 'Type of wood.',
            'image' => '/materials/timber.png',
            'rarity' => 'Common'
        ]);

        $data = [
            'name' => 'New Item',
            'description' => 'Type of lumber.',
            'image' => '/materials/wood.png',
            'rarity' => 'Uncommon'
        ];

        $response = $this->actingAs($user)
            ->patchJson("/items/{$item->id}", $data);

        $response->assertStatus(200);
        $this->assertDatabaseHas('items', $data);
    }
}
