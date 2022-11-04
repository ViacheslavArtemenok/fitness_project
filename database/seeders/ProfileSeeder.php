<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('profiles')->insert($this->getData());
    }

    /**
     *
     * @return array
     */
    private function getData(): array
    {
        $profiles = [];

        $faker = Factory::create('ru_RU');
        $faker->addProvider(new \Faker\Provider\ru_RU\Person($faker));

        for ($i = 1; $i < 100; $i++) {
            if ($i > 2 && $i % 3 === 0) {
                $profiles[] = [
                    'user_id' => $i + 1,
                    'first_name' => $faker->firstNameFemale(),
                    'last_name' => $faker->lastName('female'),
                    'father_name' => 'Петровна',
                    'age' => rand(25, 45),
                    'gender' => 'female',
                    'image' => 'image/R7iVXGJGksz1PIwveeXXu8EecSM3vY4qHs9vkS6r.jpg',
                    'created_at' => now('Europe/Moscow'),
                ];
            } else {
                $profiles[] = [
                    'user_id' => $i + 1,
                    'first_name' => $faker->firstNameMale(),
                    'last_name' => $faker->lastName('male'),
                    'father_name' => 'Александрович',
                    'age' => rand(25, 45),
                    'gender' => 'male',
                    'image' => 'image/neGE3GlAMl3E5GhNvHxDrK2B2eyzgKTQttg2Ks4b.jpg',
                    'created_at' => now('Europe/Moscow'),
                ];
            }
        }
        for ($i = 100; $i < 130; $i++) {
            if ($i > 2 && $i % 3 === 0) {
                $profiles[] = [
                    'user_id' => $i + 1,
                    'first_name' => $faker->firstNameFemale(),
                    'last_name' => $faker->lastName('female'),
                    'father_name' => 'Петровна',
                    'age' => rand(25, 45),
                    'gender' => 'female',
                    'image' => 'image/SEYY9Sj7295UdmyOVOt3prX5Zqj35tn1Q07XhDL8.jpg',
                    'created_at' => now('Europe/Moscow'),
                ];
            } else {
                $profiles[] = [
                    'user_id' => $i + 1,
                    'first_name' => $faker->firstNameMale(),
                    'last_name' => $faker->lastName('male'),
                    'father_name' => 'Александрович',
                    'age' => rand(25, 45),
                    'gender' => 'male',
                    'image' => 'image/8o9a6Xu8VR1dAFOSJyiMZlC1mXJEoCtzOn0OAFVG.jpg',
                    'created_at' => now('Europe/Moscow'),
                ];
            }
        }

        return $profiles;
    }
}
