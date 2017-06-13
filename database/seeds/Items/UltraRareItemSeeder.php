<?php

namespace Database\Seeds\Items;

use App\Item;
use Illuminate\Database\Seeder;

class UltraRareItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::create([
            'name' => 'Vendor Booth',
            'description' => '',
            'image' => '/materials/vendor-booth.png',
            'rarity' => 'Ultra-Rare',
        ]);

        Item::create([
            'name' => 'Safe',
            'description' => '',
            'image' => '/materials/safe.png',
            'rarity' => 'Ultra-Rare',
        ]);
    }
}
