<?php

namespace Database\Seeds;

use App\Race;
use Illuminate\Database\Seeder;

class RaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Race::create([
            'name' => 'Alfar',
        ]);

        Race::create([
            'name' => 'Dwarf',
        ]);

        Race::create([
            'name' => 'Elf',
        ]);

        Race::create([
            'name' => 'Human',
        ]);

        Race::create([
            'name' => 'Mahirim',
        ]);

        Race::create([
            'name' => 'Ork',
        ]);
    }
}
