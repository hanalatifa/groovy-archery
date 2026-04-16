<?php

use App\Http\Controllers\AtletController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProfileController::class, 'index'])->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function() {

    // Manage Atlet 
    Route::controller(AtletController::class)->group(function() {
        // Menampilkan Form
        Route::get('/tambah/atlet', 'create')->name('atlet.create'); 
        
        // Memproses Simpan
        Route::post('/simpan/atlet', 'store')->name('atlet.store');
    });

});

require __DIR__.'/auth.php';