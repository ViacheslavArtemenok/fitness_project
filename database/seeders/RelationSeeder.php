<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('relations')->insert($this->getData());
    }

    /**
     *
     * @return array
     */
    private function getData(): array
    {
        $relations = [];

        for ($i = 0; $i < 100; $i++) {
            $relations[] = [
                'user_id' => rand(1, 99),
                'tag_id' => rand(1, 22),
                'created_at' => now('Europe/Moscow')
            ];
        }

        return $relations;
    }
}
