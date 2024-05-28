<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Inspektorat\InspektoratController;
use App\Http\Controllers\Authentication\AuthenticationController;
use App\Http\Controllers\PerangkatDaerah\PerangkatDaerahController;
use App\Http\Controllers\PemerintahKabupaten\PemerintahKabupatenController;

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

Route::get('/', [AuthenticationController::class, 'loginView'])
    ->name('view.login.page');

Route::prefix('perangkat/daerah')->group(function () {
    Route::get('/index', [PerangkatDaerahController::class, 'index'])
    ->name('perda.index.page');
});

Route::prefix('pemerintah/kabupaten')->group(function () {
    Route::get('/index', [PemerintahKabupatenController::class, 'index'])
        ->name('pemkab.index.page');
});

Route::prefix('inspektorat')->group(function () {
    Route::get('/index', [InspektoratController::class, 'index'])
        ->name('inspektorat.index.page');
});
