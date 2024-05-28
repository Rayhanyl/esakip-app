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
    Route::prefix('perencanaan/kinerja')->group(function () {
        Route::get('/sasaran/strategis', [PerangkatDaerahController::class, 'sasaranStrategis'])
            ->name('perda.strategis.page');
        Route::get('/sasaran/program', [PerangkatDaerahController::class, 'sasaranProgram'])
            ->name('perda.program.page');
        Route::get('/sasaran/kegiatan', [PerangkatDaerahController::class, 'sasaranKegiatan'])
            ->name('perda.kegiatan.page');
        Route::get('/sasaran/subkegiatan', [PerangkatDaerahController::class, 'sasaranSubKegiatan'])
            ->name('perda.subkegiatan.page');
    });
    Route::get('/pengukuran/kinerja', [PerangkatDaerahController::class, 'pengukuranKinerja'])
        ->name('perda.pengukuran.kinerja.page');
    Route::get('/pelaporan/kinerja', [PerangkatDaerahController::class, 'pelaporanKinerja'])
        ->name('perda.pelaporan.kinerja.page');
    Route::get('/evaluasi/internal', [PerangkatDaerahController::class, 'evaluasiInternal'])
        ->name('perda.evaluasi.internal.page');
});

Route::prefix('pemerintah/kabupaten')->group(function () {
    Route::get('/index', [PemerintahKabupatenController::class, 'index'])
        ->name('pemkab.index.page');
    Route::get('/perencanaan/kinerja', [PemerintahKabupatenController::class, 'perencanaanKinerja'])
        ->name('pemkab.perencanaan.kinerja.page');
    Route::get('/pengukuran/kinerja', [PemerintahKabupatenController::class, 'pengukuranKinerja'])
        ->name('pemkab.pengukuran.kinerja.page');
    Route::get('/pelaporan/kinerja', [PemerintahKabupatenController::class, 'pelaporanKinerja'])
        ->name('pemkab.pelaporan.kinerja.page');
});

Route::prefix('inspektorat')->group(function () {
    Route::get('/index', [InspektoratController::class, 'index'])
        ->name('inspektorat.index.page');
    Route::get('/self/assessment/perangkat/daerah', [InspektoratController::class, 'selfAssessment'])
        ->name('inspektorat.self.assessment.page');
    Route::get('/evaluasi/internal', [InspektoratController::class, 'evaluasiInternal'])
        ->name('inspektorat.evaluasi.internal.page');
});
