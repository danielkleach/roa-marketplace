<?php

use Database\Seeds\RaceSeeder;
use Database\Seeds\UserSeeder;
use Illuminate\Database\Seeder;
use Database\Seeds\LocationSeeder;
use Database\Seeds\Items\ItemSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ItemSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(RaceSeeder::class);

        if (app()->environment('local', 'development')) {
            $this->call(UserSeeder::class);
        }
    }
}
