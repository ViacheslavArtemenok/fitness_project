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

        for ($i = 0; $i < 100; $i++) {
            $profiles[] = [
                'user_id'        => $i + 1,
                'first_name'     => $faker->firstNameMale(),
                'last_name'      => $faker->lastName(),
                'father_name'    => $faker->firstNameMale(),
                'age'            => rand(25, 45),
                'gender'         => 'male',
                'image'          => "https://cdn.inskill.ru/media/32540/c/1591358903_o4XapEybYWOG87t8-thumb.jpg?v=1591358908",
                'created_at'     => now('Europe/Moscow')
            ];
        }

        return $profiles;
    }
}
