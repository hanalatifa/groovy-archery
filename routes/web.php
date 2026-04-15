<?php

use App\Http\Controllers\AtletController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Halaman Publik
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Halaman yang butuh Login
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Manage Atlet
    Route::controller(AtletController::class)->group(function() {
        Route::get('/tambah/atlet', 'create')->name('atlet.create');
        Route::post('/simpan/atlet', 'store')->name('atlet.store');
    });

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Halaman Athletes (Bisa diakses publik atau sesuai kebutuhanmu)
Route::get('/athletes', function () {
    return view('athletes.athletes');
})->name('athletes');

// Memanggil sistem autentikasi dari Laravel Breeze
require __DIR__.'/auth.php';
