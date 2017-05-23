<?php

namespace Database\Seeds\Items;

use App\Item;
use Illuminate\Database\Seeder;

class CommonItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::create([
            'name' => 'Iron Ore',
            'description' => 'An unrefined piece of iron. Typically gathered from iron ore nodes throughout Agon.',
            'image' => '/materials/iron-ore.png',
            'rarity' => 'Common',
        ]);

        Item::create([
            'name' => 'Timber',
            'description' => 'An unrefined piece of lumber. Typically gathered from trees throughout Agon.',
            'image' => '/materials/timber.png',
            'rarity' => 'Common',
        ]);

        Item::create([
            'name' => 'Leather',
            'description' => 'A piece of material that can be used to create medium armor. Typically gathered from animal monster types throughout Agon.',
            'image' => '/materials/leather.png',
            'rarity' => 'Common',
        ]);

        Item::create([
            'name' => 'Cloth',
            'description' => 'A piece of material that can be used to create light armor or robes. Typically gathered from humanoid monster types throughout Agon.',
            'image' => '/materials/cloth.png',
            'rarity' => 'Common',
        ]);

        Item::create([
            'name' => 'Iron Ingot',
            'description' => 'A refined piece of iron. Typically created by crafting iron ore in a forge.',
            'image' => '/materials/iron-ingot.png',
            'rarity' => 'Common',
        ]);

        Item::create([
            'name' => 'Wood',
            'description' => 'A refine piece of lumber. Typically created by crafting timber at a workbench.',
            'image' => '/materials/wood.png',
            'rarity' => 'Common',
        ]);
    }
}
