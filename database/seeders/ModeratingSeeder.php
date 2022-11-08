<?php

namespace Database\Seeders;

use App\Models\Moderating;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            Moderating::REASON00,
            Moderating::REASON01,
            Moderating::REASON02,
            Moderating::REASON03,
            Moderating::REASON04,
            Moderating::REASON05,
        ];

        //$faker = Factory::create('ru_RU');
        //$faker->addProvider(new \Faker\Provider\ru_RU\Person($faker));

//        for ($i = 2; $i < 100; $i++) {
//
//            $statusIndex = rand(0, 2);
//
//            if ($statusIndex === 2) {
//                $moderatings[] = [
//                    'user_id'       => $i,
//                    'status'        => $status[$statusIndex],
//                    'reason'        => $rejected[rand(1, 4)],
//                    'created_at'    => now('Europe/Moscow')
//                ];
//            } else {
//                $moderatings[] = [
//                    'user_id'       => $i,
//                    'status'        => $status[$statusIndex],
//                    'reason'        => $rejected[0],
//                    'created_at'    => now('Europe/Moscow')
//                ];
//            }
//        }

        for ($i = 10; $i < 35; $i++) {
            $moderatings[] = [
                'user_id' => $i + 3,
                'status' => $status[0],
                'reason' => $rejected[0],
                'created_at' => now('Europe/Moscow')
            ];
        }

        return $moderatings;
    }
}
