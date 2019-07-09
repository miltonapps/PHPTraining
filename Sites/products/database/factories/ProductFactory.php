<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->randomElement(['Carlton Dry Lager', 
        'Corona Extra', 
        'Pure Blonde', 
        'Great Northern Lager', 
        'Stella Artois Legere', 
        'Victoria Bitter Gold', 
        'Rusty Yak', 
        'Whisky Barrel Stout', 
        'Rusty Yak', 
        'Original Cider', 
        'N1', 
        'N2', 
        'N5', 
        'N6']),
        'category_id' => $faker->numberBetween($min = 1, $max = 10),
        'brand' => 'Victoria Bitter',
        'description' => $faker->paragraph($nbSentences = 1, $variableNbSentences = true),
        'location' => 'Victoria, Australia',
        'alcohol_percentages' => $faker->randomDigit,
        'volumn_ml' => 330,
        'type' => 'Ginger Beers',
        'rating_up' => $faker->randomNumber,
        'rating_down' => $faker->randomNumber,
        'unit_price' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 600),
        'package_sm_price' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 3000),
        'package_sm_qty' => 6,
        'package_lg_price' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 65535),
        'package_lg_qty' => 24,
    ];
});
