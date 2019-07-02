<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category' => substr($faker->sentence(2), 0, -1),
        'name' => $faker->name,
        'description' => $faker->paragraph,
    ];
});
