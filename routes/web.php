<?php

use App\Models\User;
use App\Models\TenagaMedis;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;
use App\Http\Controllers\EMRController;
use App\Http\Controllers\PKSController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\ApotekController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestingController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\RawatJalanController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\MessageCenterController;
use App\Http\Controllers\TelekonsultasiController;



Route::get('/', function () {
    return view('login');
})->name('home')->middleware('guestRedirectToLogin');

Route::middleware('API')->group(function () {
    Route::prefix('api')->group(function () {
        // Route::get('/getSpecialties', [APIController::class, 'getSpecialties']);
    });
});

// // tes ke lfutter 
//     Route::get('/getDataDokter', [APIController::class, 'getDataDokter'])->name('get.data.dokter');
//     Route::get('/getDataPasien', [APIController::class, 'getDataPasien'])->name('get.data.pasien');
//     Route::get('/getSpecialties', [APIController::class, 'getSpecialties'])->name('get.specialties');
//     Route::get('/getDataTenagaMedis', [APIController::class,'getDataTenagaMedis']);
//     Route::get('/rekam-medis/{id_kunjungan}', [APIController::class, 'getDataRekamMedis']); 
//     // Route::get('/getDataRekamMedis', [APIController::class, 'getDataRekamMedis']);
//     Route::post('/book-schedule', [APIController::class, 'postFormPasien'])->name('api.book.schedule');  // Ubah nama route, tanpa hyphen

Route::get('/initesyadariferdi/{kunjunganId}', [TestingController::class, 'getEmrPasien'])->name('getDataEmr');

Route::get('/kunjungan', [RawatJalanController::class, 'kunjungan'])->name('kunjungan');
Route::get('/kunjungan-store', [RawatJalanController::class, 'kunjungan'])->name('kunjungan.store');
Route::get('/testing', function () {
    $tenagaMedis = TenagaMedis::where('job_medis', 'Dokter')->get();

    // mapping yang aman: pake getKey() untuk dapat primary key apapun namanya
    $dataDokter = $tenagaMedis->map(function ($medis) {
        return [
            'id'   => $medis->getKey(), // lebih aman daripada $medis->job_medis->id
            'nama' => $medis->nama_lengkap
                ?? $medis->nama_tenaga_medis
                ?? $medis->name
                ?? 'Dokter ' . $medis->getKey()
        ];
    })->values()->toArray(); // ke array biar blade/js lebih predictable

    return view('testing', compact('dataDokter'));
});

Route::get('/getDataTenagaMedis', [APIController::class, 'getDataTenagaMedis']);


Route::prefix('testing-david')->group(function () {
    Route::get('/calendar', [TestingController::class, 'testingCalendar'])->name('testing.calendar');
});

Route::get('/testing', [TestingController::class, 'HalamanTesting'])->name('testing');
Route::post('/testing-lempar-data', [TestingController::class, 'Testing'])->name('test.lempar.data');

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
        Route::get('/getDataPasien',[RawatJalanController::class, 'getDataPasien'])->name('getDataPasien');
    });

    Route::prefix('registrasi')->name('registrasi.')->group(function () {
        Route::get('/',                                     [RegistrasiController::class, 'index'])->name('index');
        Route::get('/getdatarawatjalanpoli',                [RegistrasiController::class, 'getDataRawatJalanPoli'])->name('getdatarawatjalanpoli');
        Route::get('/getdataantricepat',                    [RegistrasiController::class, 'getDataAntriCepat'])->name('getdataantricepat');
        Route::get('/getdatagawatdarurat',                  [RegistrasiController::class, 'getDataGawatDarurat'])->name('getdatagawatdarurat');
        Route::get('/getdatakunjungansehat',                [RegistrasiController::class, 'getDataKunjunganSehat'])->name('getdatakunjungansehat');
        Route::get('/getdatapromotifpreventif',             [RegistrasiController::class, 'getDataPromotifPreventif'])->name('getdatapromotifpreventif');
        Route::get('/getdatakegiatankelompok',              [RegistrasiController::class, 'getDataKegiatanKelompok'])->name('getdatakegiatankelompok');
    });

    Route::prefix('/pasien')->name('pasien.')->group(function () {
        Route::get('/',                     [PasienController::class, 'index'])->name('index');
        Route::get('/data',                 [PasienController::class, 'data'])->name('data');
        Route::post('/store',               [PasienController::class, 'store'])->name('store');
        Route::get('/show/{id}',            [PasienController::class, 'show'])->name('show');
        Route::post('/update/{id}',         [PasienController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}',      [PasienController::class, 'destroy'])->name('destroy');
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
