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

        for ($i = 0; $i < 100; $i++) {
            $skills[] = [
                'user_id'         => $i + 1,
                'location'        => $faker->city(),
                'education'       => $faker->text(100),
                'experience'      => rand(0, 20),
                'achievements'    => $faker->text(100),
                'skills_list'     => $faker->text(100),
                'description'     => $faker->paragraph(3),
                'created_at'      => now('Europe/Moscow')
            ];
        }

        return $skills;
    }
}
