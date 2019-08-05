<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [

        'item' => $faker->word,
        'user_id' => App\User::all()->random()->id,
    ];
});
