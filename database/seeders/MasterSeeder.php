<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('masters')->insert([
            [
                'name' => 'Алексей',
                'specialization' => 'Классические стрижки',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Данияр',
                'specialization' => 'Бороды и укладки',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Максим',
                'specialization' => 'Современные стрижки',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}