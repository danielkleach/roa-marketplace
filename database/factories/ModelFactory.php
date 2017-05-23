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
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
        'character_name' => $faker->unique()->name,
        'race' => $faker->randomElement(['Alfar', 'Dwarf', 'Elf', 'Human', 'Mahirim', 'Ork']),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Item::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->unique()->name,
        'image' => $faker->imageUrl(),
        'rarity' => $faker->randomElement(['Common', 'Rare', 'Ultra-Rare', 'Uncommon']),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Order::class, function (Faker\Generator $faker) {

    return [
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
        'item_id' => function () {
            return factory(Item::class)->create()->id;
        },
        'type' => $faker->randomElement(['Buy', 'Sell', 'Trade']),
        'price' => $faker->numberBetween(10, 50000),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Location::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->text(10),
    ];
});
