<?php

namespace Database\Seeders;

use App\Models\Moderating;
use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ModeratingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('moderatings')->insert($this->getData());
    }

    /**
     *
     * @return array
     */
    private function getData(): array
    {
        $moderatings = [];

        $status = [
            Moderating::IS_PENDING,
            Moderating::IS_APPROVED,
            Moderating::IS_REJECTED
        ];

        $rejected = [
            Moderating::REASON01,
            Moderating::REASON02,
            Moderating::REASON03,
            Moderating::REASON04,
            Moderating::REASON05,
        ];

        $faker = Factory::create('ru_RU');
        $faker->addProvider(new \Faker\Provider\ru_RU\Person($faker));

        for ($i = 1; $i < 100; $i++) {

            $statusIndex = rand(0, 2);

            if ($statusIndex === 2)  {
                $moderatings[] = [
                    'user_id'       => $i,
                    'status'        => $status[$statusIndex],
                    'reason'        => $rejected[rand(0, 4)],
                    'created_at'    => now('Europe/Moscow')
                ];
            } else {
                $moderatings[] = [
                    'user_id'       => $i,
                    'status'        => $status[$statusIndex],
                    'reason'        => '',
                    'created_at'    => now('Europe/Moscow')
                ];
            }
        }

        return $moderatings;
    }
}
