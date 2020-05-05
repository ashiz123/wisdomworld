<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        "user_id" => 130,
        "title" => $faker->title,
        "description" => "testing only for testing",
        "post_type_id" => function(){
            return factory(App\Post_type::class)->create()->id;
        },
        "links" => $faker->email,
        "author" => $faker->name,
        "slug" => $faker->text(8),
        "refrence" => $faker->text(8),
        "image" => $faker->image('public/images',640,480, null, false),
        "publish" => $faker->boolean


    ];

   
});


