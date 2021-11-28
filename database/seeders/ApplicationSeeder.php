<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('applications')->insert($this->getData());
    }

    private function getData(): array
    {
        $faker = Factory::create();
        $data = [];
        for ($i = 0 ; $i < 5; $i++)
        {
            $data[] = [
                'user_id' => 1,
                'address' => $faker->address(),
                'description' => $faker->sentence(mt_rand(3, 10)),
                'animal_type_id' => 1,
                'price' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        return $data;
    }
}
