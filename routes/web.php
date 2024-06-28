<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\AdminBaseController;
use App\Http\Controllers\Admin\PerdaProgController;
use App\Http\Controllers\Admin\PerdaKegiaController;
use App\Http\Controllers\Aspu\AspuBerandaController;
use App\Http\Controllers\Admin\PerdaSastraController;
use App\Http\Controllers\Admin\PemkabSastraController;
use App\Http\Controllers\Admin\PerdaBerandaController;
use App\Http\Controllers\Admin\InspekBerandaController;
use App\Http\Controllers\Admin\PemkabBerandaController;
use App\Http\Controllers\Admin\PerdaSubKegiaController;
use App\Http\Controllers\Admin\SelfAssesmentController;
use App\Http\Controllers\Admin\PerdaPelaporanController;
use App\Http\Controllers\Admin\PemkabPelaporanController;
use App\Http\Controllers\Admin\PerdaPengukuranController;
use App\Http\Controllers\Admin\PemkabPengukuranController;
use App\Http\Controllers\Aspu\Perencanaan\AspuIkuController;
use App\Http\Controllers\Aspu\Perencanaan\AspuAksiController;
use App\Http\Controllers\Aspu\Evaluasi\AspuEvaluasiController;
use App\Http\Controllers\Aspu\Perencanaan\AspuRenjaController;
use App\Http\Controllers\Admin\PerdaEvaluasiInternalController;
use App\Http\Controllers\Admin\InspekEvaluasiInternalController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Aspu\CascadingController;
use App\Http\Controllers\Aspu\Pelaporan\AspuPelaporanController;
use App\Http\Controllers\Aspu\PemkabCascadingController;
use App\Http\Controllers\Aspu\PemkabPohonKinerjaController;
use App\Http\Controllers\Aspu\Perencanaan\AspuRenstraController;
use App\Http\Controllers\Aspu\Pengukuran\AspuPengukuranController;
use App\Http\Controllers\Aspu\Perencanaan\AspuPerjanjianController;
use App\Http\Controllers\Aspu\PohonKinerjaController;

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

Route::prefix('get-data')->name('get-data.')->group(function () {
    Route::get('pengampu', [AdminBaseController::class, 'get_pengampu'])->name('pengampu');
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
        Route::get('/pemkab-cascading', [PemkabCascadingController::class, 'index'])
            ->name('pemkab-cascading');
        Route::get('/pemkab-cascading/get-chart', [PemkabCascadingController::class, 'get_chart'])
            ->name('pemkab-cascading.get-chart');
        Route::prefix('cascading')->name('cascading.')->group(function () {
            Route::get('/', [CascadingController::class, 'index'])
                ->name('index');
            Route::get('/get-sasaran', [CascadingController::class, 'get_sasaran'])
                ->name('get-sasaran');
            Route::get('/get-chart', [CascadingController::class, 'get_chart'])
                ->name('get-chart');
        });
        Route::prefix('pemkab-pohon-kinerja')->name('pemkab.pohon-kinerja.')->group(function () {
            Route::get('/', [PemkabPohonKinerjaController::class, 'index'])
                ->name('index');
            Route::get('/get-sasaran', [PemkabPohonKinerjaController::class, 'get_sasaran'])
                ->name('get-sasaran');
            Route::get('/get-chart', [PemkabPohonKinerjaController::class, 'get_chart'])
                ->name('get-chart');
        });
        Route::prefix('pohon-kinerja')->name('pohon-kinerja.')->group(function () {
            Route::get('/', [PohonKinerjaController::class, 'index'])
                ->name('index');
            Route::get('/get-sasaran', [PohonKinerjaController::class, 'get_sasaran'])
                ->name('get-sasaran');
            Route::get('/get-chart', [PohonKinerjaController::class, 'get_chart'])
                ->name('get-chart');
        });
    });
    Route::prefix('pengukuran-kinerja')->name('pengukuran.')->group(function () {
        Route::get('/perangkat-daerah/index', [AspuPengukuranController::class, 'perda'])
            ->name('perda-index');
        Route::get('/pemerintah-kabupaten/index', [AspuPengukuranController::class, 'pemkab'])
            ->name('pemkab-index');
        Route::get('/perangkat-daerah/detail/{id}', [AspuPengukuranController::class, 'detail'])
            ->name('perda-detail');
    });
    Route::prefix('pelaporan')->name('pelaporan.')->group(function () {
        Route::get('/perangkat-daerah/index', [AspuPelaporanController::class, 'perda'])
            ->name('perda-index');
        Route::get('/pemerintah-kabupaten/index', [AspuPelaporanController::class, 'pemkab'])
            ->name('pemkab-index');
        Route::post('/count', [AspuPelaporanController::class, 'count'])
            ->name('count');
        Route::get('/download/{id}/{tipe}', [AspuPelaporanController::class, 'download'])
            ->name('download');
    });
    Route::prefix('evaluasi')->name('evaluasi.')->group(function () {
        Route::get('/index', [AspuEvaluasiController::class, 'index'])
            ->name('index');
        Route::get('/download/{id}', [AspuEvaluasiController::class, 'download'])
            ->name('download');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('user-management/profile/{user}', [UserManagementController::class, 'profile'])
            ->name('user-management.profile');
        Route::resource('user-management', UserManagementController::class);
        Route::prefix('pemkab')->name('pemkab.')->group(function () {
            Route::resource('beranda', PemkabBerandaController::class);
            Route::prefix('sastra')->name('sastra.')->group(function () {
                Route::get('indicator', [PemkabSastraController::class, 'indicator'])
                    ->name('indicator');
                Route::get('penanggung-jawab', [PemkabSastraController::class, 'penanggung_jawab'])
                    ->name('penanggung-jawab');
                Route::get('simple-action', [PemkabSastraController::class, 'simple_action'])
                    ->name('simple-action');
            });
            Route::resource('sastra', PemkabSastraController::class);
            Route::get('pengukuran/get-indikator', [PemkabPengukuranController::class, 'getIndicator'])
                ->name('pengukuran.get-indikator');
            Route::get('pengukuran/get-target', [PemkabPengukuranController::class, 'getTarget'])
                ->name('pengukuran.get-target');
            Route::resource('pengukuran', PemkabPengukuranController::class);
            Route::get('pelaporan/{pelaporan}/download', [PemkabPelaporanController::class, 'download'])
                ->name('pelaporan.download');
            Route::resource('pelaporan', PemkabPelaporanController::class);
        });
        Route::prefix('perda')->name('perda.')->group(function () {
            Route::resource('beranda', PerdaBerandaController::class);
            Route::prefix('sastra')->name('sastra.')->group(function () {
                Route::get('indicator', [PerdaSastraController::class, 'indicator'])
                    ->name('indicator');
                Route::get('penanggung-jawab', [PerdaSastraController::class, 'penanggung_jawab'])
                    ->name('penanggung-jawab');
            });
            Route::resource('sastra', PerdaSastraController::class);
            Route::prefix('saspro')->name('saspro.')->group(function () {
                Route::get('indicator', [PerdaProgController::class, 'indicator'])
                    ->name('indicator');
            });
            Route::resource('saspro', PerdaProgController::class);
            Route::prefix('saske')->name('saske.')->group(function () {
                Route::get('indicator', [PerdaKegiaController::class, 'indicator'])
                    ->name('indicator');
            });
            Route::resource('saske', PerdaKegiaController::class);
            Route::prefix('sasubkegia')->name('sasubkegia.')->group(function () {
                Route::get('indicator', [PerdaSubKegiaController::class, 'indicator'])
                    ->name('indicator');
                Route::get('pengampu', [PerdaSubKegiaController::class, 'pengampu'])
                    ->name('pengampu');
            });
            Route::resource('sasubkegia', PerdaSubKegiaController::class);
            Route::prefix('pengukuran')->name('pengukuran.')->group(function () {
                Route::get('indicator', [PerdaPengukuranController::class, 'indicator'])
                    ->name('indicator');
                Route::get('get-data', [PerdaPengukuranController::class, 'get_data'])
                    ->name('get-data');
                Route::get('get-sub-data', [PerdaPengukuranController::class, 'get_sub_data'])
                    ->name('get-sub-data');
                Route::get('get-pagu', [PerdaPengukuranController::class, 'get_pagu'])
                    ->name('get-pagu');
                Route::get('get-value', [PerdaPengukuranController::class, 'get_value'])
                    ->name('get-value');
            });
            Route::resource('pengukuran', PerdaPengukuranController::class);
            Route::get('pelaporan/{pelaporan}/download', [PerdaPelaporanController::class, 'download'])
                ->name('pelaporan.download');
            Route::resource('pelaporan', PerdaPelaporanController::class);
            Route::prefix('/evaluasi-internal')->name('evaluasi-internal.')->group(function () {
                Route::get('/', [PerdaEvaluasiInternalController::class, 'index'])
                    ->name('index');
                Route::put('/update/{id}', [PerdaEvaluasiInternalController::class, 'update'])
                    ->name('update');
                Route::get('/download/{filename}', [PerdaEvaluasiInternalController::class, 'download'])
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
                Route::get('/download/{filename}', [PerdaEvaluasiInternalController::class, 'download'])
                    ->name('download');
            });
            Route::prefix('/evaluasi-internal')->name('evaluasi-internal.')->group(function () {
                Route::get('/', [InspekEvaluasiInternalController::class, 'index'])
                    ->name('index');
                Route::post('/store', [InspekEvaluasiInternalController::class, 'store'])
                    ->name('store');
                Route::put('/update/{id}', [InspekEvaluasiInternalController::class, 'update'])
                    ->name('update');
                Route::get('/download/{filename}', [PerdaEvaluasiInternalController::class, 'download'])
                    ->name('download');
            });
        });
    });
});
