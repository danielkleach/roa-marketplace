<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

use App\Item;
use App\User;
use Carbon\Carbon;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Profile::class, function (Faker\Generator $faker) {

    return [
        'user_id' => $faker->numberBetween(1, 10),
        'character_name' => $faker->unique()->name,
        'race' => $faker->randomElement(['Alfar', 'Dwarf', 'Elf', 'Human', 'Mahirim', 'Ork']),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Item::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->unique()->word,
        'description' => $faker->sentence(15),
        'image' => $faker->imageUrl(),
        'rarity' => $faker->randomElement(['Common', 'Rare', 'Ultra-Rare', 'Uncommon']),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Order::class, function (Faker\Generator $faker) {

    $start_at_earliest = Carbon::today()->subMonth();
    $start_at_latest = Carbon::today();

    $start_date = Carbon::instance($faker->dateTimeBetween(
        $start_at_earliest,
        $start_at_latest
    ));

    $end_date = Carbon::instance(
        $faker->dateTimeBetween($start_date->copy()->addDays(1), $start_date->copy()->addDays(10))
    );

    return [
        'user_id' => $faker->numberBetween(1, 10),
        'item_id' => $faker->numberBetween(1, 10),
        'location_id' => $faker->numberBetween(1, 6),
        'type' => $faker->randomElement(['Buy', 'Sell']),
        'quantity' => $faker->numberBetween(1, 1000),
        'price' => $faker->numberBetween(10, 200),
        'start_date' => $start_date->toDateTimeString(),
        'end_date' => $end_date->toDateTimeString(),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Location::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->text(10),
    ];
});
