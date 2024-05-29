<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Inspektorat\InspektoratController;
use App\Http\Controllers\Landingpage\LandingpageController;
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

Route::get('/login/page', [AuthenticationController::class, 'loginView'])
    ->name('view.login.page');
Route::post('/login/process', [AuthenticationController::class, 'loginProcess'])
    ->name('login.process');
Route::get('/logout/process', [AuthenticationController::class, 'logutProcess'])
    ->name('logout.process');

Route::prefix('perangkat/daerah')->name('perda.')->group(function () {
    Route::get('/index', [PerangkatDaerahController::class, 'index'])
        ->name('index.page');
    Route::prefix('/perencanaan/kinerja/sasaran')->name('perencanaan.kinerja.')->group(function () {
        Route::prefix('/strategis')->name('strategis.')->group(function () {
            Route::get('/', [PerangkatDaerahController::class, 'sasaranStrategis'])
                ->name('page');
            Route::get('/ajax', [PerangkatDaerahController::class, 'sasaranStrategisAjax'])
                ->name('ajax');
            Route::post('/store', [PerangkatDaerahController::class, 'sasaranStrategisPost'])
                ->name('store');
        });
        Route::get('/program', [PerangkatDaerahController::class, 'sasaranProgram'])
            ->name('program.page');
        Route::get('/kegiatan', [PerangkatDaerahController::class, 'sasaranKegiatan'])
            ->name('kegiatan.page');
        Route::get('/subkegiatan', [PerangkatDaerahController::class, 'sasaranSubKegiatan'])
            ->name('subkegiatan.page');
    });
    Route::get('/pengukuran/kinerja', [PerangkatDaerahController::class, 'pengukuranKinerja'])
        ->name('pengukuran.kinerja.page');
    Route::get('/pelaporan/kinerja', [PerangkatDaerahController::class, 'pelaporanKinerja'])
        ->name('pelaporan.kinerja.page');
    Route::post('/store/pelaporan/kinerja', [PerangkatDaerahController::class, 'storePelaporan'])
        ->name('store.pelaporan.kinerja');
    Route::get('/evaluasi/internal', [PerangkatDaerahController::class, 'evaluasiInternal'])
        ->name('evaluasi.internal.page');
    Route::get('/download/{filename}', [PerangkatDaerahController::class, 'downloadPelaporan'])
        ->name('perda.download.file');
});

Route::prefix('pemerintah/kabupaten')->name('pemkab.')->group(function () {
    Route::get('/index', [PemerintahKabupatenController::class, 'index'])
        ->name('index.page');
    Route::prefix('/perencanaan/kinerja')->name('perencanaan.kinerja.')->group(function () {
        Route::get('/', [PemerintahKabupatenController::class, 'perencanaanKinerja'])
            ->name('index');
        Route::post('/store', [PemerintahKabupatenController::class, 'perencanaanKinerjaPost'])
            ->name('store');
    });
    Route::prefix('/pengukuran/kinerja')->name('pengukuran.kinerja.')->group(function () {
        Route::get('/', [PemerintahKabupatenController::class, 'pengukuranKinerja'])
            ->name('index');
        Route::get('/ajax', [PemerintahKabupatenController::class, 'pengukuranKinerjaAjax'])
            ->name('ajax');
        Route::post('/store', [PemerintahKabupatenController::class, 'pengukuranKinerjaPost'])
            ->name('store');
    });
    Route::prefix('/pelaporan/kinerja')->name('pelaporan.kinerja.')->group(function () {
        Route::get('/', [PemerintahKabupatenController::class, 'pelaporanKinerja'])
            ->name('index');
        Route::post('/store', [PemerintahKabupatenController::class, 'pelaporanKinerjaPost'])
            ->name('store');
    });
    Route::get('/perencanaan/kinerja/form-indikator', [PemerintahKabupatenController::class, 'addIndicator'])
        ->name('perencanan.kinerja.form-indikator');
});

Route::prefix('inspektorat')->group(function () {
    Route::get('/index', [InspektoratController::class, 'index'])
        ->name('inspektorat.index.page');
    Route::get('/self/assessment/perangkat/daerah', [InspektoratController::class, 'selfAssessment'])
        ->name('inspektorat.self.assessment.page');
    Route::get('/evaluasi/internal', [InspektoratController::class, 'evaluasiInternal'])
        ->name('inspektorat.evaluasi.internal.page');
});

Route::get('/', [LandingpageController::class, 'homeView'])
    ->name('view.home.page');
Route::get('/perencanaan/kinerja', [LandingpageController::class, 'perencanaanKerjaView'])
    ->name('view.perencanaan.kinerja.page');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])
        ->name('page');
    Route::get('/user', [AdminController::class, 'userView'])
        ->name('user.page');
    Route::get('/create/user', [AdminController::class, 'createUserView'])
        ->name('create.user.page');
    Route::get('/edit/{user}', [AdminController::class, 'editUserView'])
        ->name('edit.user.page');
    Route::post('/store/user', [AdminController::class, 'storeUser'])
        ->name('store.user');
    Route::put('/users/{user}', [AdminController::class, 'editUser'])
        ->name('user.update');
    Route::delete('/delete/{user}', [AdminController::class, 'deleteUser'])
        ->name('delete.user');
});
