<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contacts', [PageController::class, 'contacts'])->name('contacts');
Route::view('/rules', 'rules')->name('rules');

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{service}', [ServiceController::class, 'show'])->whereNumber('service')->name('services.show');

Route::get('/masters', [MasterController::class, 'index'])->name('masters.index');
Route::get('/masters/{master}', [MasterController::class, 'show'])->whereNumber('master')->name('masters.show');

Route::get('/booking', [BookingController::class, 'create'])->middleware('hours:9,21')->name('booking');
Route::post('/booking', [BookingController::class, 'store'])->middleware('hours:9,21')->name('booking.store');

Route::get('/admin/logout', function () {
    session()->forget('is_admin');
    return redirect()->route('home');
})->name('admin.logout');

Route::prefix('admin')->name('admin.')->middleware('admin.key')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('services', AdminServiceController::class);
});