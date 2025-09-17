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
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
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
