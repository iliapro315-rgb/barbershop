<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Master;
use Illuminate\Support\Facades\Cache;

class PageController extends Controller
{
    public function home()
    {
        $data = Cache::remember('home.stats', now()->addMinutes(10), function () {
            return [
                'totalServices' => Service::count(),
                'totalMasters'  => Master::count(),
                'latestServices' => Service::with('master')->latest()->take(6)->get(),
            ];
        });

        return view('home', $data);
    }

   public function about()
{
    return view('about', [
        'fio'   => 'Иванов Иван Иванович',
        'group' => 'ПО-31',
    ]);
} function contacts()
    {
        return view('contacts', [
            'phone'   => '+7 (777) 123-45-67',
            'address' => 'г. Костанай, ул. Абая, 50',
            'email'   => 'info@barbershop.kz',
        ]);
    }
}