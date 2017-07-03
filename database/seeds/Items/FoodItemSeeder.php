<?php

namespace Database\Seeds\Items;

use App\Item;
use Illuminate\Database\Seeder;

class FoodItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::create([
            'name' => 'Fried Lobster',
            'description' => '',
            'image' => '',
            'rarity' => 'Common',
        ]);

        Item::create([
            'name' => 'Stuffed Mushrooms',
            'description' => '',
            'image' => '',
            'rarity' => 'Common',
        ]);

        Item::create([
            'name' => 'Sausage',
            'description' => '',
            'image' => '',
            'rarity' => 'Common',
        ]);

        Item::create([
            'name' => 'Meat Jerky',
            'description' => '',
            'image' => '',
            'rarity' => 'Common',
        ]);

        Item::create([
            'name' => 'Omelet',
            'description' => '',
            'image' => '',
            'rarity' => 'Common',
        ]);

        Item::create([
            'name' => 'Sausage Hash',
            'description' => '',
            'image' => '',
            'rarity' => 'Common',
        ]);

        Item::create([
            'name' => 'Sausage Omelette',
            'description' => '',
            'image' => '',
            'rarity' => 'Common',
        ]);

        Item::create([
            'name' => 'Berry Pie',
            'description' => '',
            'image' => '',
            'rarity' => 'Common',
        ]);

        Item::create([
            'name' => 'Potato Pie',
            'description' => '',
            'image' => '',
            'rarity' => 'Common',
        ]);

        Item::create([
            'name' => 'Shepherd\'s Pie',
            'description' => '',
            'image' => '',
            'rarity' => 'Common',
        ]);

        Item::create([
            'name' => 'Blueberry Cobbler',
            'description' => '',
            'image' => '',
            'rarity' => 'Common',
        ]);

        Item::create([
            'name' => 'Fish and Chips',
            'description' => '',
            'image' => '',
            'rarity' => 'Common',
        ]);

        Item::create([
            'name' => 'Fried Onions',
            'description' => '',
            'image' => '',
            'rarity' => 'Common',
        ]);
    }
}
