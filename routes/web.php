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
use App\Http\Controllers\Admin\UsermanagementController;
use App\Http\Controllers\Admin\AdminBerandaControllerer;

use App\Http\Controllers\AksesPublik\AspuBerandaController;
use App\Http\Controllers\AksesPublik\AspuEvaluasiInternalController;
use App\Http\Controllers\AksesPublik\AspuIndikatorKinerjaUtamaController;
use App\Http\Controllers\AksesPublik\AspuPelaporanKinerjaController;
use App\Http\Controllers\AksesPublik\AspuPengukuranKinerjaController;
use App\Http\Controllers\AksesPublik\AspuPerangkatDaerahDetailController;
use App\Http\Controllers\AksesPublik\AspuPerjanjianKinerjaController;
use App\Http\Controllers\AksesPublik\AspuRencanaAksiController;
use App\Http\Controllers\AksesPublik\AspuRenjaController;
use App\Http\Controllers\AksesPublik\AspuRenstraController;

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

Route::prefix('perangkat-daerah')->name('perda.')->group(function () {
    Route::get('/index', PerdaBerandaController::class)
        ->name('index');
    Route::prefix('/perencanaan-kinerja')->name('perencanaan-kinerja.')->group(function () {
        Route::prefix('/sasaran-strategis')->name('sasaran-strategis.')->group(function () {
            Route::get('/', [SasaranStrategisController::class, 'index'])
                ->name('index');
            Route::get('/indicator', [SasaranStrategisController::class, 'indicator'])
                ->name('indicator');
            Route::post('/store', [SasaranStrategisController::class, 'store'])
                ->name('store');
        });
        Route::prefix('/sasaran-program')->name('sasaran-program.')->group(function () {
            Route::get('/', [SasaranProgramController::class, 'index'])
                ->name('index');
            Route::get('/indicator', [SasaranProgramController::class, 'indicator'])
                ->name('indicator');
            Route::post('/store', [SasaranProgramController::class, 'store'])
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
        Route::get('/edit/{id}', [PerdaPelaporanKinerjaController::class, 'edit'])
            ->name('edit');
        Route::post('/store', [PerdaPelaporanKinerjaController::class, 'store'])
            ->name('store');
        Route::post('/update', [PerdaPelaporanKinerjaController::class, 'update'])
            ->name('update');
        Route::delete('/destroy/{id}', [PerdaPelaporanKinerjaController::class, 'destroy'])
            ->name('destroy');
        Route::get('/download/{filename}', [PemkabPelaporanKinerjaController::class, 'download'])
            ->name('download');
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
        Route::get('/edit', [SasaranBupatiController::class, 'edit'])
            ->name('edit');
        Route::get('/indicator', [SasaranBupatiController::class, 'indicator'])
            ->name('indicator');
        Route::post('/store', [SasaranBupatiController::class, 'store'])
            ->name('store');
        Route::post('/update', [SasaranBupatiController::class, 'update'])
            ->name('update');
        Route::delete('/destroy/{sasaranBupati}', [SasaranBupatiController::class, 'destroy'])
            ->name('destroy');
    });
    Route::prefix('/pengukuran-kinerja')->name('pengukuran-kinerja.')->group(function () {
        Route::get('/', [PemkabPengukuranKinerjaController::class, 'index'])
            ->name('index');
        Route::get('/edit/{id}', [PemkabPengukuranKinerjaController::class, 'edit'])
            ->name('edit');
        Route::get('/indicator', [PemkabPengukuranKinerjaController::class, 'indicator'])
            ->name('indicator');
        Route::get('/get-indicator', [PemkabPengukuranKinerjaController::class, 'get_indicator'])
            ->name('get-indicator');
        Route::get('/get-target', [PemkabPengukuranKinerjaController::class, 'get_target'])
            ->name('get-target');
        Route::post('/store', [PemkabPengukuranKinerjaController::class, 'store'])
            ->name('store');
        Route::post('/update/{id}', [PemkabPengukuranKinerjaController::class, 'update'])
            ->name('update');
        Route::delete('/destroy/{id}', [PemkabPengukuranKinerjaController::class, 'destroy'])
            ->name('destroy');
    });
    Route::prefix('/pelaporan-kinerja')->name('pelaporan-kinerja.')->group(function () {
        Route::get('/', [PemkabPelaporanKinerjaController::class, 'index'])
            ->name('index');
        Route::get('/edit/{id}', [PemkabPelaporanKinerjaController::class, 'edit'])
            ->name('edit');
        Route::post('/store', [PemkabPelaporanKinerjaController::class, 'store'])
            ->name('store');
        Route::post('/update/{id}', [PemkabPelaporanKinerjaController::class, 'update'])
            ->name('update');
        Route::delete('/destroy/{id}', [PemkabPelaporanKinerjaController::class, 'destroy'])
            ->name('destroy');
        Route::get('/download/{filename}', [PemkabPelaporanKinerjaController::class, 'download'])
            ->name('download');
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

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/index', AdminBerandaControllerer::class)
        ->name('index');
    Route::prefix('/user/management')->name('user-management.')->group(function () {
        Route::get('/', [UsermanagementController::class, 'index'])
            ->name('index');
        Route::get('/create', [UsermanagementController::class, 'create'])
            ->name('create');
        Route::get('/edit/{user}', [UsermanagementController::class, 'edit'])
            ->name('edit');
        Route::post('/store', [UsermanagementController::class, 'store'])
            ->name('store');
        Route::put('/update/{user}', [UsermanagementController::class, 'update'])
            ->name('update');
        Route::delete('/delete/{user}', [UsermanagementController::class, 'delete'])
            ->name('delete');
    });
});

Route::prefix('/')->name('aspu.')->group(function () {
    Route::get('/', AspuBerandaController::class)
        ->name('index');
    Route::get('/pengukuran/kinerja', [AspuPengukuranKinerjaController::class, 'index'])
        ->name('pengukuran.kinerja');
    Route::get('/perangkat/daerah/detail', [AspuPerangkatDaerahDetailController::class, 'index'])
        ->name('perangkat.daerah.detail');
    Route::get('/renstra', [AspuRenstraController::class, 'index'])
        ->name('renstra');
    Route::get('/renja', [AspuRenjaController::class, 'index'])
        ->name('renja');
    Route::get('/rencana/aksi', [AspuRencanaAksiController::class, 'index'])
        ->name('rencana.aksi');
    Route::get('/perjanjian/kinerja', [AspuPerjanjianKinerjaController::class, 'index'])
        ->name('perjanjian.kinerja');
    Route::get('/indikator/kinerja/utama', [AspuIndikatorKinerjaUtamaController::class, 'index'])
        ->name('indikator.kinerja.utama');
    Route::get('/pelaporan/kinerja', [AspuPelaporanKinerjaController::class, 'index'])
        ->name('pelaporan.kinerja');
    Route::get('/evaluasi/internal', [AspuEvaluasiInternalController::class, 'index'])
        ->name('evaluasi.internal');
});
