<?php

use App\Http\Controllers\AtletController;
use App\Http\Controllers\PertandinganController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard Utama
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::controller(AtletController::class)->group(function() {
        Route::get('/atlet', 'index')->name('atlet.index'); // Menampilkan daftar atlet
        Route::get('/tambah/atlet', 'create')->name('atlet.create');
        Route::post('/simpan/atlet', 'store')->name('atlet.store');
        Route::get('/edit/atlet/{id}', 'edit')->name('atlet.edit'); // Form edit
        Route::put('/update/atlet/{id}', 'update')->name('atlet.update'); // Proses update
        Route::delete('/hapus/atlet/{id}', 'destroy')->name('atlet.destroy'); // Proses hapus
    }); 

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // halaman pertandingan
    Route::controller(PertandinganController::class)->group(function() {
        Route::get('/kelola-pertandingan', 'index')->name('pertandingan.index'); 
        Route::get('/tambah/pertandingan', 'create')->name('pertandingan.create');
        Route::post('/simpan/pertandingan', 'store')->name('pertandingan.store');
        Route::get('/edit/pertandingan/{id}', 'edit')->name('pertandingan.edit');
        Route::put('/update/pertandingan/{id}', 'update')->name('pertandingan.update');
        Route::delete('/hapus/pertandingan/{id}', 'destroy')->name('pertandingan.destroy');
    });
});

require __DIR__ . '/auth.php';
