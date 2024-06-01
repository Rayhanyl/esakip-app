<?php

use App\Http\Controllers\Admin\InspekBerandaController;
use App\Http\Controllers\Admin\InspekEvaluasiInternalController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\PemkabBerandaController;
use App\Http\Controllers\Admin\PemkabPelaporanKinerjaController;
use App\Http\Controllers\Admin\PemkabPengukuranKinerjaController;
use App\Http\Controllers\Admin\PerdaBerandaController;
use App\Http\Controllers\Admin\PerdaEvaluasiInternalController;
use App\Http\Controllers\Admin\PerdaPelaporanKinerjaController;
use App\Http\Controllers\Admin\SasaranProgramController;
use App\Http\Controllers\Admin\SasaranKegiatanController;
use App\Http\Controllers\Admin\SasaranStrategisController;
use App\Http\Controllers\Admin\SasaranSubKegiatanController;
use App\Http\Controllers\Admin\PerdaPengukuranKinerjaController;
use App\Http\Controllers\Admin\SasaranBupatiController;
use App\Http\Controllers\Admin\SelfAssesmentController;

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

Route::prefix('authentication')->name('auth.')->group(function () {
    Route::get('/index', [AuthController::class, 'index'])
        ->name('index');
    Route::get('/login', [AuthController::class, 'login'])
        ->name('login');
    Route::get('/logout', [AuthController::class, 'logout'])
        ->name('logout');
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
        Route::get('/', [PerdaPengukuranKinerjaController::class, 'index'])
            ->name('index');
        Route::post('/store', [PerdaPengukuranKinerjaController::class, 'store'])
            ->name('store');
    });
    Route::prefix('/pelaporan-kinerja')->name('pelaporan-kinerja.')->group(function () {
        Route::get('/', [PerdaPelaporanKinerjaController::class, 'index'])
            ->name('index');
        Route::post('/store', [PerdaPelaporanKinerjaController::class, 'store'])
            ->name('store');
    });
    Route::prefix('/evaluasi-internal')->name('evaluasi-internal.')->group(function () {
        Route::get('/', [PerdaEvaluasiInternalController::class, 'index'])
            ->name('index');
        Route::get('/download/{filename}', [PerdaEvaluasiInternalController::class, 'download'])
            ->name('download');
    });
});

Route::prefix('pemerintah-kabupaten')->name('pemkab.')->group(function () {
    Route::get('/index', PemkabBerandaController::class)
        ->name('index');
    Route::prefix('/perencanaan-kinerja')->name('perencanaan-kinerja.')->group(function () {
        Route::get('/', [SasaranBupatiController::class, 'index'])
            ->name('index');
        Route::post('/store', [SasaranBupatiController::class, 'store'])
            ->name('store');
    });
    Route::prefix('/pengukuran-kinerja')->name('pengukuran-kinerja.')->group(function () {
        Route::get('/', [PemkabPengukuranKinerjaController::class, 'index'])
            ->name('index');
        Route::post('/store', [PemkabPengukuranKinerjaController::class, 'store'])
            ->name('store');
    });
    Route::prefix('/pelaporan-kinerja')->name('pelaporan-kinerja.')->group(function () {
        Route::get('/', [PemkabPelaporanKinerjaController::class, 'index'])
            ->name('index');
        Route::post('/store', [PemkabPelaporanKinerjaController::class, 'store'])
            ->name('store');
    });
});

Route::prefix('inspektorat')->name('inspek.')->group(function () {
    Route::get('/index', InspekBerandaController::class)
        ->name('index');
    Route::prefix('/self-assesment')->name('self-assesment.')->group(function () {
        Route::get('/', [SelfAssesmentController::class, 'index'])
            ->name('index');
        Route::post('/store', [SelfAssesmentController::class, 'store'])
            ->name('store');
    });
    Route::prefix('/evaluasi-internal')->name('evaluasi-internal.')->group(function () {
        Route::get('/', [InspekEvaluasiInternalController::class, 'index'])
            ->name('index');
        Route::post('/store', [InspekEvaluasiInternalController::class, 'store'])
            ->name('store');
    });
});
