<?php

use App\Http\Controllers\AtletController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentationController;

// Halaman Publik (HOME)
Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('/athletes', function () {
    return view('athletes-page.athletes');
})->name('athletes');

Route::get('/achievements', function () {
    return view('achievements.achievements');
})->name('achievements');


// Halaman yang butuh Login
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Manage Atlet
    Route::controller(AtletController::class)->group(function () {
        Route::get('/tambah/atlet', 'create')->name('atlet.create');
        Route::post('/simpan/atlet', 'store')->name('atlet.store');
    });

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


   // Documentation
    Route::get('/documentations', [DocumentationController::class, 'index'])->name('documentations.index');
    Route::get('/documentations/create', [DocumentationController::class, 'create'])->name('documentations.create');
    Route::post('/documentations', [DocumentationController::class, 'store'])->name('documentations.store');
    Route::get('/documentations/{id}/edit', [DocumentationController::class, 'edit'])->name('documentations.edit');
    Route::put('/documentations/{id}', [DocumentationController::class, 'update'])->name('documentations.update');
    Route::delete('/documentations/{id}', [DocumentationController::class, 'destroy'])->name('documentations.destroy');

});


require __DIR__ . '/auth.php';
