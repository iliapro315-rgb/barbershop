<?php

namespace Database\Seeders;

use App\Models\Master;
use App\Models\Service;
use App\Models\Booking;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $masters = [
            ['name' => 'Алексей Иванов', 'specialization' => 'Топ-барбер', 'experience_years' => 7, 'bio' => 'Мастер классических стрижек и моделирования бороды.'],
            ['name' => 'Дмитрий Петров', 'specialization' => 'Брейдер & Стилист', 'experience_years' => 5, 'bio' => 'Специалист по современным молодежным трендам.'],
            ['name' => 'Арман Сериков', 'specialization' => 'Мастер королевского бритья', 'experience_years' => 10, 'bio' => 'Эксперт в области опасного бритья и ухода за кожей.'],
        ];

        foreach ($masters as $m) {
            $master = Master::create($m);

            Service::create([
                'master_id' => $master->id,
                'title' => 'Мужская стрижка (' . $master->name . ')',
                'description' => 'Классическая или современная стрижка с мытьем головы.',
                'price' => rand(4000, 7000),
                'duration_minutes' => 45,
                'is_active' => true,
            ]);

            Service::create([
                'master_id' => $master->id,
                'title' => 'Оформление бороды (' . $master->name . ')',
                'description' => 'Коррекция формы бороды и усов с горячим распариванием.',
                'price' => rand(3000, 5000),
                'duration_minutes' => 30,
                'is_active' => true,
            ]);
        }

        Booking::factory(10)->create();
    }
}