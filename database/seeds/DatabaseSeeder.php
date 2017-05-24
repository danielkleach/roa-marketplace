<?php

use Database\Seeds\Items\ItemSeeder;
use Database\Seeds\LocationSeeder;
use Database\Seeds\OrderSeeder;
use Database\Seeds\ProfileSeeder;
use Database\Seeds\UserSeeder;
use Illuminate\Database\Seeder;

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
        $this->call(UserSeeder::class);
        $this->call(ProfileSeeder::class);
        $this->call(OrderSeeder::class);
    }
}
