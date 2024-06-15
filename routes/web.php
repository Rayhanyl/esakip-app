<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Aspu\AspuBerandaController;
use App\Http\Controllers\Aspu\Perencanaan\AspuIkuController;
use App\Http\Controllers\Aspu\Perencanaan\AspuAksiController;
use App\Http\Controllers\Aspu\Perencanaan\AspuRenjaController;
use App\Http\Controllers\Aspu\Evaluasi\AspuEvaluasiController;
use App\Http\Controllers\Aspu\Perencanaan\AspuRenstraController;
use App\Http\Controllers\Aspu\Pelaporan\AspuPelaporanController;
use App\Http\Controllers\Aspu\Pengukuran\AspuPengukuranController;
use App\Http\Controllers\Aspu\Perencanaan\AspuPerjanjianController;

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

Route::get('/storage/link', function () {
    Artisan::call('storage:link');
});

Route::prefix('authentication')->name('auth.')->group(function () {
    Route::get('/index', [AuthController::class, 'index'])
        ->name('index');
    Route::post('/login', [AuthController::class, 'login'])
        ->name('login');
    Route::get('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});

Route::prefix('/')->name('aspu.')->group(function () {
    Route::get('/', AspuBerandaController::class)
        ->name('index');
    Route::prefix('perencanaan-kerja')->name('perencanaan.')->group(function () {
        Route::get('/perda-renstra', [AspuRenstraController::class, 'perda'])
            ->name('perda-renstra');
        Route::get('/pemkab-rpjmd', [AspuRenstraController::class, 'pemkab'])
            ->name('pemkab-rpjmd');
        Route::get('/perda-renja', [AspuRenjaController::class, 'perda'])
            ->name('perda-renja');
        Route::get('/pemkab-rkpd', [AspuRenjaController::class, 'pemkab'])
            ->name('pemkab-rkpd');
        Route::get('/perda-aksi', [AspuAksiController::class, 'perda'])
            ->name('perda-aksi');
        Route::get('/pemkab-aksi', [AspuAksiController::class, 'pemkab'])
            ->name('pemkab-aksi');
        Route::get('/perda-perjanjian', [AspuPerjanjianController::class, 'perda'])
            ->name('perda-perjanjian');
        Route::get('/pemkab-perjanjian', [AspuPerjanjianController::class, 'pemkab'])
            ->name('pemkab-perjanjian');
        Route::get('/perda-iku', [AspuIkuController::class, 'perda'])
            ->name('perda-iku');
        Route::get('/pemkab-iku', [AspuIkuController::class, 'pemkab'])
            ->name('pemkab-iku');
    });
    Route::prefix('pengukuran-kinerja')->name('pengukuran.')->group(function () {
        Route::get('/index', [AspuPengukuranController::class, 'index'])
            ->name('index');
        Route::get('/detail', [AspuPengukuranController::class, 'detail'])
            ->name('detail');
    });
    Route::prefix('pelaporan')->name('pelaporan.')->group(function () {
        Route::get('/index', [AspuPelaporanController::class, 'index'])
            ->name('index');
        Route::get('/count', [AspuPelaporanController::class, 'count'])
            ->name('count');
    });
    Route::prefix('evaluasi')->name('evaluasi.')->group(function () {
        Route::get('/index', [AspuEvaluasiController::class, 'index'])
            ->name('index');
        Route::get('/download/{id}', [AspuEvaluasiController::class, 'download'])
            ->name('download');
    });
});
