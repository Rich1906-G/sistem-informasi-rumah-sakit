<?php

use App\Http\Controllers\ApotekController;
use App\Http\Controllers\UserController;
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
use App\Models\User;

// testing jimy
use App\Http\Controllers\Testing\TestingController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// testing jimy
Route::prefix('testing')->name('testing.')->group(function () {
    Route::get('/',                                     [TestingController::class, 'index'])->name('index');
    Route::get('/getjadwaldokter',                      [TestingController::class, 'getJadwalDokter'])->name('getjadwaldokter');
    Route::get('/getdetailjadwaldokter/{id}',           [TestingController::class, 'getDetailJadwalDokter'])->name('getdetailjadwaldokter');
});

// Route::get('/testing', function () {
//     $user = User::get();

//     dd($user);

//     return view('testing', compact('user'));
// })->name('testing');

// Route::get('/testing', [UserController::class, 'testing'])->name('testing');
// Route::post('/testing-lempar-data', [UserController::class, 'lemparData'])->name('test.lempar.data');


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
        Route::get('/getpendapatanbulanan',                 [DashboardController::class, 'getPendapatanBulanan'])->name('getpendapatanbulanan');
        Route::get('/getpengeluaranbulanan',                [DashboardController::class, 'getPengeluaranBulanan'])->name('getpengeluaranbulanan');
    });

    Route::prefix('rawat_jalan')->name('rawat_jalan.')->group(function () {
        Route::get('/',                                     [RawatJalanController::class, 'index'])->name('index');
        Route::get('/getjadwaldokter',                      [RawatJalanController::class, 'getJadwalDokter'])->name('getjadwaldokter');
    });

    Route::prefix('registrasi')->name('registrasi.')->group(function () {
        Route::get('/',                                     [RegistrasiController::class, 'index'])->name('index');
        Route::get('/getdatarawatjalanpoli',                [RegistrasiController::class, 'getDataRawatJalanPoli'])->name('getdatarawatjalanpoli');
    });


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
