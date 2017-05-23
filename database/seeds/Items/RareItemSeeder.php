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
            'description' => 'A unrefined piece of selentine. Typically gathered from iron ore nodes throughout Agon.',
            'image' => '/materials/selentine-ore.png',
            'rarity' => 'Rare',
        ]);

        Item::create([
            'name' => 'Veilron Ore',
            'description' => 'A unrefined piece of veilron. Typically gathered from iron ore nodes throughout Agon.',
            'image' => '/materials/veilron-ore.png',
            'rarity' => 'Rare',
        ]);

        Item::create([
            'name' => 'Neithal Ore',
            'description' => 'A unrefined piece of neithal. Typically gathered from iron ore nodes throughout Agon.',
            'image' => '/materials/neithal-ore.png',
            'rarity' => 'Rare',
        ]);

        Item::create([
            'name' => 'Leenspar Ore',
            'description' => 'A unrefined piece of leenspar. Typically gathered from iron ore nodes throughout Agon.',
            'image' => '/materials/leenspar-ore.png',
            'rarity' => 'Rare',
        ]);

        Item::create([
            'name' => 'Theyril Ore',
            'description' => 'A unrefined piece of theyril. Typically gathered from iron ore nodes throughout Agon.',
            'image' => '/materials/theyril-ore.png',
            'rarity' => 'Rare',
        ]);
    }
}
