<?php

namespace Database\Seeders;

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
        $this->call([
            AnimalTypeSeeder::class,
            UserSeeder::class,
            ApplicationSeeder::class,
            UserProfileSeeder::class,
            MessagesSeeder::class
        ]);
    }
}
