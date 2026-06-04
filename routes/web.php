<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\MahasiswaController;

Route::middleware('auth')->group(function () {
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])
        ->name('mahasiswa.index');

    Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])
        ->name('mahasiswa.create');

    Route::post('/mahasiswa', [MahasiswaController::class, 'store'])
        ->name('mahasiswa.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/prodi', [ProdiController::class, 'index'])
        ->name('prodi.index');

    Route::get('/prodi/create', [ProdiController::class, 'create'])
        ->name('prodi.create');

    Route::post('/prodi', [ProdiController::class, 'store'])
        ->name('prodi.store');
});
Route::middleware('auth')->group(function () {
    Route::get('/fakultas', [FakultasController::class, 'index'])
        ->name('fakultas.index');

    Route::get('/fakultas/create', [FakultasController::class, 'create'])
        ->name('fakultas.create');

    Route::post('/fakultas', [FakultasController::class, 'store'])
        ->name('fakultas.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/periode', [PeriodeController::class, 'index'])
        ->name('periode.index');

    Route::get('/periode/create', [PeriodeController::class, 'create'])
        ->name('periode.create');

    Route::post('/periode', [PeriodeController::class, 'store'])
        ->name('periode.store');
});

Route::get('/', function () {
    return view('welcome');
});

// AUTH DASHBOARD
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

// PROFILE ROUTES
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';