<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert($this->getData());
    }

    private function getData(): array
    {
        $faker = Factory::create();
        $data = [];
        for ($i = 0 ; $i < 5; $i++)
        {
            $data[] = [
                'name' => $faker->lastName(),
                'email' => $faker->email(),
                'password' => '12345678',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        return $data;
    }
}
