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

    public function getData(): array {
        $gyms = [];
        $faker=Factory::create('ru_RU');
        $faker->addProvider(new \Faker\Provider\ru_RU\Person($faker));
        for ($i = 0; $i < 20; $i++) {
            if ($i%2==0) {
                $phone_second ='+7 ' . '(9' . rand(10, 99) . ') ' . rand(100, 999) . '-' . rand(10, 99) . '-' . rand(10, 99);
            } else
            {
                $phone_second = null;
            }

            $gyms[] = [
                'id' => $i + 1,
                'user_id' => rand(1,99),
                'phone_main' => '+7 ' . '(9' . rand(10, 99) . ') ' . rand(100, 999) . '-' . rand(10, 99) . '-' . rand(10, 99),
                'phone_second' => $phone_second,
                'email' => $faker->email(),
                'url' => 'https://www.youtube.com/',
                'description'          => $faker->text(75),
                'created_at'     => now('Europe/Moscow')
            ];
        }

        return $gyms;


    }
}
