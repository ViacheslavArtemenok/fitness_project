<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GymsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gyms')->insert($this->getData());
    }

    public function getData(): array
    {
        $gyms = [];
        $faker = Factory::create('ru_RU');
        $faker->addProvider(new \Faker\Provider\ru_RU\Person($faker));
        for ($i = 0; $i < 20; $i++) {
            if ($i > 2 && $i % 3 == 0) {
                $phone_second = null;
            } else {
                $phone_second = '+7 ' . '(9' . rand(10, 99) . ') ' . rand(100, 999) . '-' . rand(10, 99) . '-' . rand(10, 99);
            }

            $gyms[] = [
                'user_id' => $i + 131,
                'phone_main' => '+7 ' . '(9' . rand(10, 99) . ') ' . rand(100, 999) . '-' . rand(10, 99) . '-' . rand(10, 99),
                'phone_second' => $phone_second,
                'email' => $faker->email(),
                'url' => 'https://fitness-cccp.ru/wp-content/uploads/2017/05/' . $i + 1 . '-832x522.jpg',
                'description'          => $faker->text(400),
                'created_at'     => now('Europe/Moscow')
            ];
        }

        return $gyms;
    }
}
