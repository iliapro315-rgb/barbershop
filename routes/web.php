
<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about', [
        'fio' => 'Иванов Иван Иванович',
        'group' => 'ИС-21'
    ]);
})->name('about');

Route::get('/contacts', function () {
    return view('contacts', [
        'address' => 'г. Костанай, ул. Байтурсынова, 47',
        'phone' => '+7 (7142) 00-00-00',
        'email' => 'barbershop@example.com'
    ]);
})->name('contacts');

Route::get('/hello/{name}', function ($name) {
    return "Здравствуйте, {$name}! Добро пожаловать в Барбершоп.";
})->name('hello');

Route::get('/services', function () {
    $items = config('catalog.items');

    return view('services.index', compact('items'));
})->name('services.index');

Route::get('/services/{id}', function (int $id) {
    $item = config("catalog.items.$id");

    if (!$item) {
        abort(404);
    }

    return view('services.show', [
        'id' => $id,
        'item' => $item,
    ]);
})->whereNumber('id')->name('services.show');

Route::view('/rules', 'rules')->name('rules');

Route::redirect('/main', '/');

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['visit', 'working.hours', 'admin.key'])
    ->group(function () {
        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::get('/services', function () {
            $items = config('catalog.items');

            return view('admin.services', compact('items'));
        })->name('services');

        Route::get('/services/create', function () {
            return view('admin.services-create');
        })->name('services.create');
    });
