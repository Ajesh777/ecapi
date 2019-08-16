<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Review;
use Faker\Generator as Faker;
// 5.1 Add the Product Model
use App\Model\Product;

$factory->define(Review::class, function (Faker $faker) {
    return [
        // 5.2 Create faker
            'customer' => $faker->name,
            'review' => $faker->paragraph,
            'star' => $faker->numberBetween(0,5),
            // Create product_id from id of Product table:
            'product_id' => function() {
                return Product::all()->random();
            }
    ];
});
