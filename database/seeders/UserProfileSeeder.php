<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class UserProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('user_profiles')->insert($this->getData());
    }

    private function getData(): array
    {
        $faker = Factory::create();
        $data = [];
        for ($i = 0 ; $i < 5; $i++)
        {
            $data[] = [
                'user_id' => $i + 1,
                'phone' => $faker->phoneNumber(),
                'passport_number' => $faker->numberBetween($int1 = 1000000000, $int2 = 9999999999),
                'profile_image' => 'http://via.placeholder.com/150x150',
            ];
        }
        return $data;
    }
}
