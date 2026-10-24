<?php

namespace App\Observers;

use App\Models\Service;
use Illuminate\Support\Facades\Cache;

class ServiceObserver
{
    public function saved(Service $service): void
    {
        Cache::forget('home.stats');
        Cache::forget('masters.menu');
    }

    public function deleted(Service $service): void
    {
        Cache::forget('home.stats');
        Cache::forget('masters.menu');
    }
}