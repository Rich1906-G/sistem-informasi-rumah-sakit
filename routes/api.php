<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PengantarController;
use App\Http\Controllers\EMRController; // Pastikan Anda mengimpor EMRController

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// --------- ROUTES UNTUK AUTENTIKASI (LOGIN & REGISTER) ---------
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Endpoint yang dilindungi, hanya bisa diakses setelah login
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // --------- ROUTES UNTUK DATA PENGANTAR (CRUD) ---------
    Route::resource('pengantars', PengantarController::class)->only(['index', 'store']);

    // --------- Rute untuk mengambil data profil pasien ---------
    Route::get('/pasien/{id_pasien}', [EMRController::class, 'show']);
    
    // --------- Rute untuk memperbarui profil pasien ---------
    Route::patch('/pasien/{id_pasien}', [EMRController::class, 'update']);

    // --------- Rute baru untuk memperbarui foto profil pasien ---------
    Route::post('/pasien/{id_pasien}/update-foto-profil', [EMRController::class, 'updateFotoProfil']);
});