<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Models\Service;
use App\Models\Master;

Artisan::command('catalog:stats', function () {
    $this->info('--- Статистика Барбершопа ---');
    $this->info('Всего услуг: ' . Service::count());
    $this->info('Всего мастеров: ' . Master::count());
})->purpose('Вывод статистики каталога');

Schedule::command('bookings:close-old --days=7')->dailyAt('03:00')->withoutOverlapping();
Schedule::command('catalog:stats')->everyMinute()->appendOutputTo(storage_path('logs/stats.log'));