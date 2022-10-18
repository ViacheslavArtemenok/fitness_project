<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GymsAddressesSeedr extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gym_addresses')->insert($this->getData());
    }

    public function getData(): array {
        $gym_addresses = [];
        $faker=Factory::create('ru_RU');
        $faker->addProvider(new \Faker\Provider\ru_RU\Person($faker));
        for ($i = 0; $i < 100; $i++) {
            if ($i%3==0) {
                $building = rand(1, 20);
                $apartment = null;
            } elseif ($i%5 == 0){
                $building= rand(1,5);
                $apartment = 'the best apartments in the world';
            } else
            {
                $building = null;
                $apartment = rand(1,50);
            }


            $gym_addresses[] = [
                'id' => $i + 1,
                'gym_id' => rand(1,20),
                'index' => rand(10000, 99999),
                'country' => $faker->country(),
                'city' => $faker->city(),
                'street' => $faker->streetName(),
                'house_number' => rand(1,200),
                'building' => $building,
                'floor' => rand(1,30),
                'apartment' => $apartment,
                'created_at' => now('Europe/Moscow')
            ];
        }

        return $gym_addresses;


    }
}
