<?php

use App\Http\Controllers\AtletController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function() {

    // Manage Atlet
    Route::controller(AtletController::class)->group(function() {
        Route::get('/tambah/atlet', 'create')->name('atlet.create'); 
        Route::post('/simpan/atlet', 'store')->name('atlet.store');
    });
});

// Memanggil sistem autentikasi (Login/Register) dari Laravel Breeze
require __DIR__.'/auth.php';