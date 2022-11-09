<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
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
        $status = [
            User::DRAFT,
            User::ACTIVE,
            User::BLOCKED
        ];

        $users = [];

        $faker = Factory::create('ru_RU');
        $faker->addProvider(new \Faker\Provider\ru_RU\Person($faker));

        $users[] = [
            'role_id'     => 1,
            'name'        => 'admin',
            'email'       => 'admin@mail.ru',
            'phone'       => '+7 (999) 999-99-99',
            'status'      => User::ACTIVE,
            'password'    => Hash::make('12345678'),
            'email_verified_at' => now('Europe/Moscow'),
            'created_at'  => now('Europe/Moscow')
        ];

        for ($i = 1; $i < 100; $i++) {
            $users[] = [
                'role_id'     => 2,
                'name'        => $faker->userName(),
                'email'       => $faker->email(),
                'phone'       => '+7 ' . '(9' . rand(10, 99) . ') ' . rand(100, 999) . '-' . rand(10, 99) . '-' . rand(10, 99),
                'status'      => $status[rand(0, 2)],
                'password'    => Hash::make('12345678'),
                'email_verified_at' => now('Europe/Moscow'),
                'created_at'  => now('Europe/Moscow')
            ];
        }

        for ($i = 0; $i < 30; $i++) {
            $users[] = [
                'role_id'     => 3,
                'name'        => $faker->userName(),
                'email'       => $faker->email(),
                'phone'       => '+7 ' . '(9' . rand(10, 99) . ') ' . rand(100, 999) . '-' . rand(10, 99) . '-' . rand(10, 99),
                'status'      => $status[rand(0, 2)],
                'password'    => Hash::make('12345678'),
                'email_verified_at' => now('Europe/Moscow'),
                'created_at'  => now('Europe/Moscow')
            ];
        }

        for ($i = 0; $i < 20; $i++) {
            $users[] = [
                'role_id'     => 4,
                'name'        => $faker->userName(),
                'email'       => $faker->email(),
                'phone'       => '+7 ' . '(9' . rand(10, 99) . ') ' . rand(100, 999) . '-' . rand(10, 99) . '-' . rand(10, 99),
                'status'      => $status[rand(0, 2)],
                'password'    => Hash::make('12345678'),
                'email_verified_at' => now('Europe/Moscow'),
                'created_at'  => now('Europe/Moscow')
            ];
        }

        return $users;
    }
}
