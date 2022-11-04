<?php

namespace Database\Seeders;

use App\Models\Role;
use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert($this->getData());
    }

    /**
     *
     * @return array
     */
    private function getData(): array
    {
        $roles = [];

        $faker = Factory::create('ru_RU');
        $faker->addProvider(new \Faker\Provider\ru_RU\Person($faker));

        $roles[] = [
            'role'         => Role::IS_ADMIN,
            'title'        => 'Администротор',
            'description'  => $faker->paragraph(rand(6, 10)),
            'created_at'   => now('Europe/Moscow')
        ];

        $roles[] = [
            'role'         => Role::IS_TRAINER,
            'title'        => 'Тренер',
            'description'  => $faker->paragraph(rand(6, 10)),
            'created_at'   => now('Europe/Moscow')
        ];

        $roles[] = [
            'role'         => Role::IS_CLIENT,
            'title'        => 'Клиент спортзала',
            'description'  => $faker->paragraph(rand(6, 10)),
            'created_at'   => now('Europe/Moscow')
        ];

        $roles[] = [
            'role'         => Role::IS_GYM,
            'title'        => 'Владелец спортзала',
            'description'  => $faker->paragraph(rand(6, 10)),
            'created_at'   => now('Europe/Moscow')
        ];

        return $roles;
    }
}
