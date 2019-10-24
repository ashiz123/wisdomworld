<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(EducationSeeder::class);
        $this->call(PostTypeSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(UserinfoSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(TagSeeder::class);
        
        

    }
}
