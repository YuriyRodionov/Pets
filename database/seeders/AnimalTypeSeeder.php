<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AnimalTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('animal_types')->insert(
            [
                ['name' => 'cat'],
                ['name' => 'dog']
            ]
        );
    }
}
