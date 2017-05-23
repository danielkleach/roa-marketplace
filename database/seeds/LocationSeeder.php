<?php

namespace Database\Seeds;

use App\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::create([
            'name' => 'Alfar Lands',
        ]);

        Location::create([
            'name' => 'Dwarf Lands',
        ]);

        Location::create([
            'name' => 'Elf Lands',
        ]);

        Location::create([
            'name' => 'Human Lands',
        ]);

        Location::create([
            'name' => 'Mahirim Lands',
        ]);

        Location::create([
            'name' => 'Ork Lands',
        ]);
    }
}
