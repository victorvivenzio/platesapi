<?php

use App\Plate;
use App\Category;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Plate::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph(1),
        'price' => $faker->randomFloat(2, 0, 3),
        'status' => $faker->randomElement([Plate::PLATE_AVALAIBLE, Plate::PLATE_NOT_AVALAIBLE]),
        'category_id' => Category::inRandomOrder()->first()->id,
    ];
});
