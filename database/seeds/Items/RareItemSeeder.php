<?php

namespace Database\Seeds\Items;

use App\Item;
use Illuminate\Database\Seeder;

class RareItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::create([
            'name' => 'Selentine Ore',
            'description' => 'An unrefined piece of selentine. Typically gathered from iron ore nodes throughout Agon.',
            'image' => '/materials/selentine-ore.png',
            'rarity' => 'Rare',
        ]);

        Item::create([
            'name' => 'Veilron Ore',
            'description' => 'An unrefined piece of veilron. Typically gathered from iron ore nodes throughout Agon.',
            'image' => '/materials/veilron-ore.png',
            'rarity' => 'Rare',
        ]);

        Item::create([
            'name' => 'Neithal Ore',
            'description' => 'An unrefined piece of neithal. Typically gathered from iron ore nodes throughout Agon.',
            'image' => '/materials/neithal-ore.png',
            'rarity' => 'Rare',
        ]);

        Item::create([
            'name' => 'Leenspar Ore',
            'description' => 'An unrefined piece of leenspar. Typically gathered from iron ore nodes throughout Agon.',
            'image' => '/materials/leenspar-ore.png',
            'rarity' => 'Rare',
        ]);

        Item::create([
            'name' => 'Theyril Ore',
            'description' => 'An unrefined piece of theyril. Typically gathered from iron ore nodes throughout Agon.',
            'image' => '/materials/theyril-ore.png',
            'rarity' => 'Rare',
        ]);

        Item::create([
            'name' => 'Selentine Ingot',
            'description' => 'A refined piece of selentine. Can be smelted in a furnace.',
            'image' => '/materials/selentine-ingot.png',
            'rarity' => 'Rare',
        ]);

        Item::create([
            'name' => 'Veilron Ingot',
            'description' => 'A refined piece of veilron. Can be smelted in a furnace.',
            'image' => '/materials/veilron-ingot.png',
            'rarity' => 'Rare',
        ]);

        Item::create([
            'name' => 'Neithal Ingot',
            'description' => 'A refined piece of neithal. Can be smelted in a furnace.',
            'image' => '/materials/neithal-ingot.png',
            'rarity' => 'Rare',
        ]);

        Item::create([
            'name' => 'Leenspar Ingot',
            'description' => 'A refined piece of leenspar. Can be smelted in a furnace.',
            'image' => '/materials/leenspar-ingot.png',
            'rarity' => 'Rare',
        ]);

        Item::create([
            'name' => 'Theyril Ingot',
            'description' => 'A refined piece of theyril. Can be smelted in a furnace.',
            'image' => '/materials/theyril-ingot.png',
            'rarity' => 'Rare',
        ]);
    }
}
