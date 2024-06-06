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
            Route::get('/edit', [SasaranStrategisController::class, 'edit'])
                ->name('edit');
            Route::get('/indicator', [SasaranStrategisController::class, 'indicator'])
                ->name('indicator');
            Route::get('/get-indicator', [SasaranStrategisController::class, 'get_indicator'])
                ->name('get-indicator');
            Route::get('/penanggung-jawab', [SasaranStrategisController::class, 'penanggung_jawab'])
                ->name('penanggung-jawab');
            Route::post('/store', [SasaranStrategisController::class, 'store'])
                ->name('store');
            Route::post('/update', [SasaranStrategisController::class, 'update'])
                ->name('update');
            Route::delete('/destroy', [SasaranStrategisController::class, 'destroy'])
                ->name('destroy');
        });
        Route::prefix('/sasaran-program')->name('sasaran-program.')->group(function () {
            Route::get('/', [SasaranProgramController::class, 'index'])
                ->name('index');
            Route::get('/edit', [SasaranProgramController::class, 'edit'])
                ->name('edit');
            Route::get('/indicator', [SasaranProgramController::class, 'indicator'])
                ->name('indicator');
            Route::post('/store', [SasaranProgramController::class, 'store'])
                ->name('store');
            Route::post('/update', [SasaranProgramController::class, 'update'])
                ->name('update');
            Route::delete('/destroy', [SasaranProgramController::class, 'destroy'])
                ->name('destroy');
        });
        Route::prefix('/sasaran-kegiatan')->name('sasaran-kegiatan.')->group(function () {
            Route::get('/', [SasaranKegiatanController::class, 'index'])
                ->name('index');
            Route::get('/edit', [SasaranKegiatanController::class, 'edit'])
                ->name('edit');
            Route::get('/indicator', [SasaranKegiatanController::class, 'indicator'])
                ->name('indicator');
            Route::post('/store', [SasaranKegiatanController::class, 'store'])
                ->name('store');
            Route::post('/update', [SasaranKegiatanController::class, 'update'])
                ->name('update');
            Route::delete('/destroy', [SasaranKegiatanController::class, 'destroy'])
                ->name('destroy');
        });
        Route::prefix('/sasaran-sub-kegiatan')->name('sasaran-sub-kegiatan.')->group(function () {
            Route::get('/', [SasaranSubKegiatanController::class, 'index'])
                ->name('index');
            Route::get('/edit', [SasaranSubKegiatanController::class, 'edit'])
                ->name('edit');
            Route::get('/indicator', [SasaranSubKegiatanController::class, 'indicator'])
                ->name('indicator');
            Route::post('/store', [SasaranSubKegiatanController::class, 'store'])
                ->name('store');
            Route::post('/update', [SasaranSubKegiatanController::class, 'update'])
                ->name('update');
            Route::delete('/destroy/{sasaranStrategis}', [SasaranSubKegiatanController::class, 'destroy'])
                ->name('destroy');
        });
    });
    Route::prefix('/pengukuran-kinerja')->name('pengukuran-kinerja.')->group(function () {
        Route::get('/', [PerdaPengukuranKinerjaController::class, 'index'])
            ->name('index');
        Route::get('/edit/{perdaPengukuranKinerja}', [PerdaPengukuranKinerjaController::class, 'edit'])
            ->name('edit');
        Route::put('/update/{perdaPengukuranKinerja}', [PerdaPengukuranKinerjaController::class, 'update'])
            ->name('update');
        Route::get('/get-sasaran-strategis', [PerdaPengukuranKinerjaController::class, 'get_sasaran_strategis'])
            ->name('get-sasaran-strategis');
        Route::get('/get-indicator', [PerdaPengukuranKinerjaController::class, 'get_indicator'])
            ->name('get-indicator');
        Route::get('/get-indicator-sub-kegiatan', [PerdaPengukuranKinerjaController::class, 'get_indicator_sub_kegiatan'])
            ->name('get-indicator-sub-kegiatan');
        Route::get('/get-target-sub-kegiatan', [PerdaPengukuranKinerjaController::class, 'get_target_sub_kegiatan'])
            ->name('get-target-sub-kegiatan');
        Route::get('/get-pagu-sub-kegiatan', [PerdaPengukuranKinerjaController::class, 'get_pagu_sub_kegiatan'])
            ->name('get-pagu-sub-kegiatan');
        Route::get('/get-indicator-tahunan', [PerdaPengukuranKinerjaController::class, 'get_indicator_tahunan'])
            ->name('get-indicator-tahunan');
        Route::get('/get-target-tahunan', [PerdaPengukuranKinerjaController::class, 'get_target_tahunan'])
            ->name('get-target-tahunan');
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
        Route::put('/update/{id}', [PerdaEvaluasiInternalController::class, 'update'])
            ->name('update');
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
        Route::get('/simple-action', [SasaranBupatiController::class, 'simple_action'])
            ->name('simple-action');
        Route::get('/penanggung-jawab', [SasaranBupatiController::class, 'penanggung_jawab'])
            ->name('penanggung-jawab');
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
        Route::put('/update/{id}', [SelfAssesmentController::class, 'update'])
            ->name('update');
    });
    Route::prefix('/evaluasi-internal')->name('evaluasi-internal.')->group(function () {
        Route::get('/', [InspekEvaluasiInternalController::class, 'index'])
            ->name('index');
        Route::post('/store', [InspekEvaluasiInternalController::class, 'store'])
            ->name('store');
        Route::put('/update/{id}', [InspekEvaluasiInternalController::class, 'update'])
            ->name('update');
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
    Route::get('/pemkab/renstra', [AspuRenstraController::class, 'pemkabIndex'])
        ->name('pemkab-renstra');
    Route::get('/renja', [AspuRenjaController::class, 'index'])
        ->name('renja');
    Route::get('/pemkab/renja', [AspuRenjaController::class, 'pemkabIndex'])
        ->name('pemkab-renja');
    Route::get('/pemkab/rencana/aksi', [AspuRencanaAksiController::class, 'pemkabIndex'])
        ->name('pemkab-rencana.aksi');
    Route::get('/rencana/aksi', [AspuRencanaAksiController::class, 'index'])
        ->name('rencana.aksi');
    Route::get('/perjanjian/kinerja', [AspuPerjanjianKinerjaController::class, 'index'])
        ->name('perjanjian.kinerja');
    Route::get('/pemkab/perjanjian/kinerja', [AspuPerjanjianKinerjaController::class, 'pemkabIndex'])
        ->name('pemkab-perjanjian.kinerja');
    Route::get('/indikator/kinerja/utama', [AspuIndikatorKinerjaUtamaController::class, 'index'])
        ->name('indikator.kinerja.utama');
    Route::get('pemkab/indikator/kinerja/utama', [AspuIndikatorKinerjaUtamaController::class, 'index'])
        ->name('indikator.kinerja.utama');
    Route::get('/pelaporan/kinerja', [AspuPelaporanKinerjaController::class, 'index'])
        ->name('pelaporan.kinerja');
    Route::post('/pelaporan/kinerja/count', [AspuPelaporanKinerjaController::class, 'count'])
        ->name('pelaporan.kinerja.count');
    Route::get('/evaluasi/internal', [AspuEvaluasiInternalController::class, 'index'])
        ->name('evaluasi.internal');
    Route::get('/download/lhe', [AspuEvaluasiInternalController::class, 'download'])
        ->name('download.lhe');
});
