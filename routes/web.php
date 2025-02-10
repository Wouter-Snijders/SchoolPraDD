<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/car/create/step1', [CarController::class, 'createStep1'])->name('car.create.step1');
Route::post('/car/create/step1', [CarController::class, 'postCreateStep1']);

Route::get('/car/create/step2', [CarController::class, 'createStep2'])->name('car.create.step2');
Route::post('/car/create/step2', [CarController::class, 'postCreateStep2']);

Route::get('/cars', [CarController::class, 'index'])->name('cars.index')->middleware('auth');

Route::middleware('auth')->group(function () {
    //
});

require __DIR__.'/auth.php';
