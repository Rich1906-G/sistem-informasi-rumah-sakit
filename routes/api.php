<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\APIController;
use App\Http\Controllers\PengantarController;
use App\Http\Controllers\EMRController; 

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// --------- ROUTES UNTUK AUTENTIKASI (LOGIN & REGISTER) ---------
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// --------- ROUTES PUBLIK (TANPA AUTH) ---------
Route::get('/getDataTenagaMedis', [APIController::class, 'getDataTenagaMedis']);
Route::get('/getSpecialties', [APIController::class, 'getSpecialties']);

// --------- ROUTES YANG MEMBUTUHKAN AUTENTIKASI ---------
Route::middleware('auth:sanctum')->group(function () {
    // Rute untuk mendapatkan data user yang sedang login (Middleware 'auth:sanctum' yang benar)
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    
    // --------- Rute BARU untuk mengambil SEMUA EMR pasien berdasarkan ID Pasien ---------
    // ✅ Ini memperbaiki error 404 dari Flutter
    Route::get('/emr-pasien/{pasienId}', [APIController::class, 'getEmrPasien']);

    // Booking schedule endpoint
    Route::post('/book-schedule', [APIController::class, 'bookSchedule']);

    // --------- ROUTES UNTUK DATA PENGANTAR (CRUD) ---------
    Route::resource('pengantars', PengantarController::class)->only(['index', 'store']);

    // --------- Rute untuk mengambil data profil pasien ---------
    Route::get('/pasien/{id_pasien}', [EMRController::class, 'show']);
    
    // --------- Rute untuk memperbarui profil pasien ---------
    Route::patch('/pasien/{id_pasien}', [EMRController::class, 'update']);

    // --------- Rute baru untuk memperbarui foto profil pasien ---------
    Route::post('/pasien/{id_pasien}/update-foto-profil', [EMRController::class, 'updateFotoProfil']);

    // --------- Rute untuk rekam medis (per kunjungan) ---------
    Route::get('/rekam-medis/{id_kunjungan}', [APIController::class, 'getDataRekamMedis']);

    // Route::get('/initesyadariferdi/{kunjunganId}', [APIController::class, 'getEmrPasien'])->name('getDataEmr');
    // ⬆️ Route lama yang ambigu/tidak terpakai sudah dikomentari.

});