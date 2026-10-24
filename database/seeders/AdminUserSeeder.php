<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@barbershop.test'],
            [
                'name' => 'Администратор',
                'password' => 'password',
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'user@barbershop.test'],
            [
                'name' => 'Обычный пользователь',
                'password' => 'password',
                'role' => 'user',
            ]
        );
    }
}