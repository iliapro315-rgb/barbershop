<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function home()
    {
        return view('home', [
            'appName' => config('app.name'),
        ]);
    }

    public function about()
    {
        return view('about', [
            'fio'   => 'Ляхов Илья Павлович',   // ← свои ФИО
            'group' => 'ПОВТ-24Б',                  // ← свою группу
        ]);
    }

    public function contacts()
    {
        return view('contacts', [
            'address' => 'г. Алматы, ул. Абая 150',
            'phone'   => '+7 (727) 123-45-67',
            'email'   => 'info@barbershop.kz',
        ]);
    }

    public function rules()
    {
        return view('rules');
    }
}