<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\ServiceController;
use App\Http\Controllers\Api\V1\MasterController;

Route::prefix('v1')->name('api.v1.')->middleware('throttle:60,1')->group(function () {
    Route::get('/ping', fn () => response()->json([
        'status' => 'ok',
        'service' => 'Barbershop API',
        'time' => now()->toIso8601String()
    ], 200, [], JSON_UNESCAPED_UNICODE));

    Route::get('/services/random', [ServiceController::class, 'random'])->name('services.random');
    Route::get('/stats', [ServiceController::class, 'stats'])->name('stats');

    Route::apiResource('services', ServiceController::class)->only(['index', 'show']);

    Route::get('/masters', [MasterController::class, 'index'])->name('masters.index');
    Route::get('/masters/{master}/services', [MasterController::class, 'services'])->name('masters.services');
});