<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        // 4.1 Create faker:
            'name' => $faker->word,
            'detail' => $faker->paragraph,
            'price' => $faker->numberBetween(100,5000),
            'stock' => $faker->randomDigit,
            'discount' => $faker->numberBetween(2,40),
        // 23.1 Update with user_id:
            'user_id' => function(){
                return App\User::all()->random();
            }
    ];
});
