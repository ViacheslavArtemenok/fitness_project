<?php
declare(strict_types=1);

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('users')->insert($this->getData());
    }

    /**
     *
     * @return array
     */
    private function getData(): array
    {
        $users = [];

        $faker = Factory::create('ru_RU');
        $faker->addProvider(new \Faker\Provider\ru_RU\Person($faker));

        for ($i = 0; $i < 100; $i++) {
            $users[] = [
                'name'        => $faker->userName(),
                'email'       => $faker->email(),
                //'role'        => rand(0, 2),
                'password'    => Hash::make('12345678'),
                'email_verified_at' => now('Europe/Moscow'),
                'created_at'  => now('Europe/Moscow')
            ];
        }

        return $users;
    }
}
