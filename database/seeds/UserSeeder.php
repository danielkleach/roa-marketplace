<?php

namespace Database\Seeds;

use App\User;
use App\Order;
use App\Profile;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(User::class, 100)->create();

        $users->each(function($user) {
            factory(Profile::class)->create(['user_id' => $user->id]);
            factory(Order::class)->create(['user_id'=> $user->id]);
        });
    }
}
