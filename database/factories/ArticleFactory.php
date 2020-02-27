<?php

use App\Category;
use Faker\Generator as Faker;

$factory->define(App\Article::class, function (Faker $faker) {
    $categories = Category::pluck('id')->all();
    return [
        'name' => $faker->word(),
        'body' => $faker->sentence(),
        'author_id' => $faker->randomNumber(),
        'category_id' => $faker->randomElement($categories),
    ];
});
