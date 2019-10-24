<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post_type;
use Faker\Generator as Faker;

$factory->define(Post_type::class, function (Faker $faker) {
    return [
        "title" => $faker->text(8),
        "description" => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        
    ];
});
