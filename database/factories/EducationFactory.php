<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Education;
use Faker\Generator as Faker;


$factory->define(Education::class, function (Faker $faker) {
    return [
        "user_id" => function(){
            return factory(App\User::class)->create()->id;
        },
        "highest_level" => $faker->text(10),
        "main_subject" => $faker->name,
        "skills" => $faker->realText(rand(10,20)),
        "completion_on" => $faker->date
    ];
});


