<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('skills')->insert($this->getData());
    }

    /**
     *
     * @return array
     */
    private function getData(): array
    {
        $skills = [];

        $faker = Factory::create('ru_RU');
        $faker->addProvider(new \Faker\Provider\ru_RU\Person($faker));

        for ($i = 1; $i < 100; $i++) {
            do {
                $city = $faker->city();
            } while ($city === 'Москва');
            if ($i % 2 === 0) {
                $city = 'Москва';
            }

            $skills[] = [
                'user_id'         => $i + 1,
                'location'        => $city,
                'education'       => $faker->company(),
                'experience'      => rand(1, 20),
                'achievements'    => $faker->paragraph(rand(3, 8)),
                'skills_list'     => $faker->paragraph(rand(6, 10)),
                'description'     => $faker->paragraph(rand(6, 10)),
                'created_at'      => now('Europe/Moscow')
            ];
        }
        return $skills;
    }
}
