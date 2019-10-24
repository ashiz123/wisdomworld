<?php

use Illuminate\Database\Seeder;
use phpDocumentor\Reflection\Types\Void_;

class UserinfoSeeder extends Seeder
{
     /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        return factory(App\User\Userinfo::class, 5)->create();
       
    }


}