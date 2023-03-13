<?php

use App\Http\Controllers\KlasemenController;
use App\Http\Controllers\KlubController;
use App\Http\Controllers\PertandinganController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});
Route::resource('/klub', KlubController::class);
Route::resource('/klasemen', KlasemenController::class);
Route::resource('/pertandingan', PertandinganController::class);