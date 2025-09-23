<?php

use App\Http\Controllers\ApotekController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EMRController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\MessageCenterController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\PKSController;
use App\Http\Controllers\RawatJalanController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TelekonsultasiController;

Route::get('/', function () {
    return view('welcome');
});



Route::middleware(['auth', 'verified'])->group(function () {

    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/',                                     [DashboardController::class, 'index'])->name('index');
        Route::get('/chart-kunjungan',                      [DashboardController::class, 'getChartKunjungan'])->name('chart.kunjungan');
        Route::get('/average-waktukonsultasi',              [DashboardController::class, 'getAverageWaktuKonsultasi'])->name('average.waktukonsultasi');
        Route::get('/getnewpatients',                       [DashboardController::class, 'getNewPatients'])->name('getnewpatients');
        Route::get('/getregisteredpatients',                [DashboardController::class, 'getRegisteredPatientsSummary'])->name('getregisteredpatients');
        Route::get('/getaveragewaittime',                   [DashboardController::class, 'getAverageWaitTime'])->name('getaveragewaittime');
        Route::get('/getobathabiscount',                    [DashboardController::class, 'getObatHabisCount'])->name('getobathabiscount');
        Route::get('/getaverageapotekwaittime',             [DashboardController::class, 'getAverageApotekWaitTime'])->name('getaverageapotekwaittime');
        Route::get('/getdatakunjunganantricepat',           [DashboardController::class, 'getDataKunjunganAntriCepat'])->name('getdatakunjunganantricepat');
    });

    Route::get('/rawat-jalan', [RawatJalanController::class, 'index'])->name('rawat.jalan');
    Route::get('/registrasi', [RegistrasiController::class, 'index'])->name('registrasi');
    Route::get('/emr', [EMRController::class, 'index'])->name('emr');
    Route::get('/apotek', [ApotekController::class, 'index'])->name('apotek');
    Route::get('/kasir', [KasirController::class, 'index'])->name('kasir');
    Route::get('/message-center', [MessageCenterController::class, 'index'])->name('message.center');
    Route::get('/telekonsultasi', [TelekonsultasiController::class, 'index'])->name('telekonsultasi');
    Route::get('/office', [OfficeController::class, 'index'])->name('office');
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    Route::get('/pks', [PKSController::class, 'index'])->name('pks');
    Route::get('/pertanyaan', [PertanyaanController::class, 'index'])->name('pertanyaan');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
