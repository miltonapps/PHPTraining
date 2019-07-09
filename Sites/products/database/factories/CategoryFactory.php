<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->randomElement(['Water', 
        'Milk', 
        'Soft Drinks', 
        'Juice and Juice Drinks', 
        'Beer', 
        'Cider', 
        'Wine', 
        'Spirits', 
        'Coffee', 
        'Hot Chocolate']),
    ];
});
