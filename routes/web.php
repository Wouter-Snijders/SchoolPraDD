<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/stage', function () {
    return view('stage');
})->name('stage');

Route::get('/car/create/step1', [CarController::class, 'createStep1'])->name('car.create.step1');
Route::post('/car/create/step1', [CarController::class, 'postCreateStep1']);

Route::get('/car/create/step2', [CarController::class, 'createStep2'])->name('car.create.step2');
Route::post('/car/create/step2', [CarController::class, 'postCreateStep2']);

Route::get('/cars', [CarController::class, 'index'])->name('cars.index')->middleware('auth');
Route::delete('/cars/{id}', [CarController::class, 'destroy'])->name('cars.destroy');

Route::middleware('auth')->group(function () {
    //
});

require __DIR__.'/auth.php';


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
