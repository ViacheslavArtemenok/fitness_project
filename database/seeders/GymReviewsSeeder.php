<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GymReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gym_reviews')->insert($this->getData());
    }

    /**
     *
     * @return array
     */
    private function getData(): array
    {
        $gymReviews = [];

        $faker = Factory::create('ru_RU');
        $faker->addProvider(new \Faker\Provider\ru_RU\Person($faker));

        for ($i = 0; $i < 100; $i++) {
            $gymReviews[] = [
                'client_id' => rand(1, 99),
                'gym_id' => rand(1, 19),
                'title' => $faker->text(15),
                'description' => $faker->text(100),
                'score' => rand(0, 5),
                'status' => 'DRAFT',
                'created_at'  => now('Europe/Moscow')
            ];
        }

        return $gymReviews;
    }
}
