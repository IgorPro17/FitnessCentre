<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/informations', function () {
    return view('informations');
});

Route::get('/contacts', function () {
    return view('contacts');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('price', App\Http\Controllers\PriceController::class);

Route::resource('coach', App\Http\Controllers\CoachController::class);

Route::resource('training', App\Http\Controllers\TrainingController::class);
