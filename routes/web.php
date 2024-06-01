<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Admin\PerdaBerandaController;
use App\Http\Controllers\Admin\PerdaPelaporanKinerja;
use App\Http\Controllers\Admin\SasaranProgramController;
use App\Http\Controllers\Admin\SasaranKegiatanController;
use App\Http\Controllers\Admin\SasaranStrategisController;
use App\Http\Controllers\Admin\SasaranSubKegiatanController;
use App\Models\PerdaPengukuranKinerja;

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
    return view('welcome');
});

Route::get('/storage/link', function () {
    Artisan::call('storage:link');
});






Route::prefix('perangkat-daerah')->name('perda.')->group(function () {
    Route::get('/index', PerdaBerandaController::class)
        ->name('index');
    Route::prefix('/perencanaan-kinerja')->name('perencanaan-kinerja.')->group(function () {
        Route::prefix('/sasaran-strategis')->name('sasaran-strategis.')->group(function () {
            Route::get('/', [SasaranStrategisController::class, 'index'])
                ->name('index');
            Route::post('/store', [SasaranStrategisController::class, 'store'])
                ->name('store');
        });
        Route::prefix('/sasaran-program')->name('sasaran-program.')->group(function () {
            Route::get('/', [SasaranProgramController::class, 'index'])
                ->name('page');
            Route::post('/store', [SasaranStrategisController::class, 'store'])
                ->name('store');
        });
        Route::prefix('/sasaran-kegiatan')->name('sasaran-kegiatan.')->group(function () {
            Route::get('/', [SasaranKegiatanController::class, 'index'])
                ->name('index');
            Route::post('/store', [SasaranKegiatanController::class, 'store'])
                ->name('store');
        });
        Route::prefix('/sasaran-sub-kegiatan')->name('sasaran-sub-kegiatan.')->group(function () {
            Route::get('/', [SasaranSubKegiatanController::class, 'index'])
                ->name('index');
            Route::post('/store', [SasaranSubKegiatanController::class, 'store'])
                ->name('store');
        });
    });
    Route::prefix('/pengukuran-kinerja')->name('pengukuran-kinerja.')->group(function () {
        Route::get('/', [PerdaPengukuranKinerja::class, 'index'])
        ->name('index');
        Route::post('/store', [PerdaPengukuranKinerja::class, 'store'])
        ->name('store');
    });
    Route::prefix('/pelaporan-kinerja')->name('pelaporan-kinerja.')->group(function () {
        Route::get('/', [PerdaPelaporanKinerja::class, 'index'])
            ->name('index');
    });
});
