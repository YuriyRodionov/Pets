<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class MessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('messages')->insert($this->getData());
    }

    private function getData(): array
    {
        $faker = Factory::create();
        $data = [];
        for ($i = 0 ; $i < 5; $i++)
        {
            $data[] = [
                'from' => 1,
                'to' => 2,
                'text' => $faker->text(mt_rand(50, 100)),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        return $data;
    }
}
