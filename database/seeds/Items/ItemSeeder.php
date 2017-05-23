<?php

namespace Database\Seeds\Items;

use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CommonItemSeeder::class);
        $this->call(UncommonItemSeeder::class);
        $this->call(RareItemSeeder::class);
        $this->call(UltraRareItemSeeder::class);
    }
}
