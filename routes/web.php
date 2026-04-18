<?php

use App\Http\Controllers\AtletController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DocumentationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| 1. Public Routes (Akses Tanpa Login)
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/athletes', function () {
    return view('athletes-page.athletes');
})->name('athletes');

Route::get('/achievements', function () {
    return view('achievements.achievements');
})->name('achievements');

Route::get('/dashboard-view', function () {
    return view('dashboard.dashboard');
})->name('dashboard');

Route::get('/tambah-atlet', function () {
    return view('dashboard.tambah-atlet');
})->name('tambah.atlet');

Route::get('/tambah-atlet/create', function () {
    return view('dashboard.form-tambah-atlet');
})->name('tambah.atlet.create');

Route::post('/tambah-atlet/create', function () {

    return redirect()->route('tambah.atlet')
        ->with('success', 'Data atlet berhasil ditambahkan!');
})->name('tambah.atlet.store');

// kelola data atlet
Route::get('/kelola-atlet', function () {
    return view('dashboard.kelola-atlet');
})->name('kelola.atlet');

// edit data atlet
Route::get('/kelola-atlet/{id}/edit', function ($id) {
    return view('dashboard.edit-atlet', compact('id'));
})->name('kelola.atlet.edit');

/*
|--------------------------------------------------------------------------
| 2. Protected Routes (Wajib Login & Verifikasi)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard Utama
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Manajemen Atlet (Groovy Archery)
    Route::controller(AtletController::class)->group(function () {
        Route::get('/tambah/atlet', 'create')->name('atlet.create');
        Route::post('/simpan/atlet', 'store')->name('atlet.store');
    });

    // Manajemen Profile User
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    // Manajemen Dokumentasi
    Route::controller(DocumentationController::class)->group(function () {
        Route::get('/documentations', 'index')->name('documentations.index');
        Route::get('/documentations/create', 'create')->name('documentations.create');
        Route::post('/documentations', 'store')->name('documentations.store');
        Route::get('/documentations/{id}/edit', 'edit')->name('documentations.edit');
        Route::put('/documentations/{id}', 'update')->name('documentations.update');
        Route::delete('/documentations/{id}', 'destroy')->name('documentations.destroy');
    });

});

require __DIR__ . '/auth.php';
