<?php

namespace Database\Seeds\Items;

use App\Item;
use Illuminate\Database\Seeder;

class UncommonItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::create([
            'name' => 'Lesser Essence',
            'description' => 'The life essence of a lesser monster.',
            'image' => '/essences/lesser-essence.png',
            'rarity' => 'Uncommon',
        ]);

        Item::create([
            'name' => 'Greater Essence',
            'description' => 'The life essence of a greater monster.',
            'image' => '/essences/greater-essence.png',
            'rarity' => 'Uncommon',
        ]);

        Item::create([
            'name' => 'Fire Essence',
            'description' => 'The life essence of a fire monster.',
            'image' => '/essences/fire-essence.png',
            'rarity' => 'Uncommon',
        ]);

        Item::create([
            'name' => 'Air Essence',
            'description' => 'The life essence of an air monster.',
            'image' => '/essences/air-essence.png',
            'rarity' => 'Uncommon',
        ]);

        Item::create([
            'name' => 'Water Essence',
            'description' => 'The life essence of a water monster.',
            'image' => '/essences/water-essence.png',
            'rarity' => 'Uncommon',
        ]);

        Item::create([
            'name' => 'Earth Essence',
            'description' => 'The life essence of an earth monster.',
            'image' => '/essences/earth-essence.png',
            'rarity' => 'Uncommon',
        ]);

        Item::create([
            'name' => 'Witchcraft Essence',
            'description' => 'The life essence of a witch monster.',
            'image' => '/essences/witchcraft-essence.png',
            'rarity' => 'Uncommon',
        ]);

        Item::create([
            'name' => 'Spellchanting Essence',
            'description' => 'The life essence of a spell-chanting monster.',
            'image' => '/essences/spellchanting-essence.png',
            'rarity' => 'Uncommon',
        ]);

        Item::create([
            'name' => 'Arcane Essence',
            'description' => 'The life essence of an arcane monster.',
            'image' => '/essences/arcane-essence.png',
            'rarity' => 'Uncommon',
        ]);

        Item::create([
            'name' => 'Necromancy Essence',
            'description' => 'The life essence of a necrotic monster.',
            'image' => '/essences/necromancy-essence.png',
            'rarity' => 'Uncommon',
        ]);
    }
}
