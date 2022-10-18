<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscriptions')->insert($this->getData());
    }

    private function getData(): array
    {
        $users = [];

        $faker = Factory::create('ru_RU');
        $faker->addProvider(new \Faker\Provider\ru_RU\Person($faker));

        for ($i = 0; $i < 50; $i++) {

            $users[] = [
                'email'       => $faker->email(),
                'phone'       => '+7 ' . '(9' . rand(10, 99) . ') ' . rand(100, 999) . '-' . rand(10, 99) . '-' . rand(10, 99),
                'created_at'  => now('Europe/Moscow')
            ];
        }

        return $users;
    }
}
