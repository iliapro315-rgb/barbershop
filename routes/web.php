
<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contacts', [PageController::class, 'contacts'])->name('contacts');
Route::get('/rules', [PageController::class, 'rules'])->name('rules');

Route::get('/services', [ServiceController::class, 'index'])
    ->name('services.index');

Route::get('/services/{id}', [ServiceController::class, 'show'])
    ->whereNumber('id')
    ->name('services.show');

Route::get('/hello/{name}', function (string $name) {
    return "Здравствуйте, {$name}! Добро пожаловать в Барбершоп.";
});

Route::redirect('/main', '/');

Route::prefix('admin')
    ->name('admin.')
    ->middleware('admin.key')
    ->group(function () {
        Route::get('/', \App\Http\Controllers\Admin\DashboardController::class)->name('dashboard');

        Route::resource('services', \App\Http\Controllers\Admin\ServiceController::class)
            ->except(['show']);

        Route::get('/logout', function () {
            session()->forget('is_admin');
            return redirect('/');
        })->name('logout');
    });