<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrainerReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trainer_reviews')->insert($this->getData());
    }

    /**
     *
     * @return array
     */
    private function getData(): array
    {
        $trainerReviews = [];

        $faker = Factory::create('ru_RU');
        $faker->addProvider(new \Faker\Provider\ru_RU\Person($faker));

        for ($i = 0; $i < 100; $i++) {
            $trainerReviews[] = [
                'client_id' => rand(1, 99),
                'trainer_id' => rand(1, 99),
                'title' => $faker->text(15),
                'description' => $faker->text(100),
                'score' => rand(0, 5),
                'status' => 'DRAFT',
                'created_at'  => now('Europe/Moscow')
            ];
        }

        return $trainerReviews;
    }
}
