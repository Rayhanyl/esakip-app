<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\SinergiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(RegisterController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::middleware('api:sanctum')->group(function () {
    Route::controller(SinergiController::class)->group(function () {
        Route::get('perjanjian-kinerja', 'getPerjanjianKinerja');
        Route::get('perjanjian-kinerja/{nip}', 'getPerjanjianKinerjaNip');
        Route::get('capaian-iku', 'getCapaianIku');
        Route::get('capaian-iku/{opd}', 'getCapaianIkuOpd');
    });
});
