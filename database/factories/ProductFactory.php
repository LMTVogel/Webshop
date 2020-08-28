<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'description' => $faker->sentence($nbWords = 20, $variableNbWords = true),
        'price' => rand(10, 50),
        'image' => 'images/kaarten.jpg',
        'cat_id' => rand(1, 5),
    ];
});
