<?php

namespace Database\Seeders;

use App\Models\TrainerReview;
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

        for ($i = 2; $i < 101; $i++) {
            for ($e = 0; $e < rand(4, 12); $e++) {
                $trainerReviews[] = [
                    'client_id' => rand(101, 130),
                    'trainer_id' => $i,
                    'title' => $faker->paragraph(1),
                    'description' => $faker->paragraph(rand(3, 10)),
                    'score' => rand(4, 5),
                    'status' => TrainerReview::ACTIVE,
                    'created_at'  => now('Europe/Moscow')
                ];
            }
        }
        return $trainerReviews;
    }
}
