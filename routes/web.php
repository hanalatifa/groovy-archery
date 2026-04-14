<?php

use App\Http\Controllers\AtletController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Halaman Utama - Diarahkan langsung ke view 'welcome' agar Front-end muncul
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Dashboard - Hanya bisa diakses jika sudah Login
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Grouping Route yang memerlukan Login (Auth)
Route::middleware('auth')->group(function() {

    // Manage Atlet
    Route::controller(AtletController::class)->group(function() {
        // Menampilkan Form Tambah Atlet
        Route::get('/tambah/atlet', 'create')->name('atlet.create'); 
        
        // Memproses Simpan Data Atlet
        Route::post('/simpan/atlet', 'store')->name('atlet.store');
    });

    // Kamu bisa menambah route profile dari temanmu di sini jika sudah diperbaiki
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
});

// Memanggil sistem autentikasi (Login/Register) dari Laravel Breeze
require __DIR__.'/auth.php';