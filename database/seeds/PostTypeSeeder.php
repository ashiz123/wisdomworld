<?php

use Illuminate\Database\Seeder;


class PostTypeSeeder extends Seeder
{
      /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return factory(App\Post_type::class, 5)->create();
    }
}

