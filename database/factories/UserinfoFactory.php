<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User\Userinfo;
use Faker\Generator as Faker;

$factory->define(Userinfo::class, function (Faker $faker) {

  

    return [
       
            'user_id' => function () {
                return factory(App\User::class)->create()->id;
            },
            'contact' => $faker->phoneNumber,
            'date_of_birth' => $faker->dateTimeBetween('1990-01-01', '2012-12-31')->format('Y-m-d'),
            'country' => 'UK',
            'state' => 'kent',
            'address' =>$faker->name,
            'image' => $faker->image('public/images',640,480, null, false),

            

            
        
    ];
});
