<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GymImagesSeedr extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gym_images')->insert($this->getData());
    }
    public function getData(): array
    {
        $gym_images = [];

        for ($i = 0; $i < 20; $i++) {
            for ($e = 0; $e < 6; $e++) {
                $gym_images[] = [
                    'gym_id' => $i + 1,
                    'image' => 'https://fitness-cccp.ru/wp-content/uploads/2017/05/' . rand(1, 24) . '-832x522.jpg',
                    'created_at' => now('Europe/Moscow')
                ];
            }
        }
        return $gym_images;
    }
}
