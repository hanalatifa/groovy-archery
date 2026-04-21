<?php

use App\Http\Controllers\AtletController;
use App\Http\Controllers\PertandinganController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DocumentationController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| 1. Public Routes (Tanpa Login)
|--------------------------------------------------------------------------
*/

Route::get('/', [LandingPageController::class, 'index'])->name('welcome');

Route::get('/athletes', function () {
    return view('athletes-page.athletes');
})->name('athletes');

Route::get('/achievements', function () {
    return view('achievements.achievements');
})->name('achievements');

Route::get('/gallery', function () {
    return view('gallery.gallery');
})->name('gallery');

// User kirim testimoni
Route::post('/testimoni', [TestimonialController::class, 'store'])->name('testimoni.store');


/*
|--------------------------------------------------------------------------
| 2. Protected Routes (Wajib Login)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard Utama
    Route::get('/dashboard-view', function () {
        return view('dashboard.dashboard');
    })->name('dashboard');

    // Manajemen Atlet
    Route::controller(AtletController::class)->group(function () {
        Route::get('/atlet', 'index')->name('atlet.index');
        Route::get('/tambah/atlet', 'create')->name('atlet.create');
        Route::post('/simpan/atlet', 'store')->name('atlet.store');
        Route::get('/edit/atlet/{id}', 'edit')->name('atlet.edit');
        Route::put('/update/atlet/{id}', 'update')->name('atlet.update');
        Route::delete('/hapus/atlet/{id}', 'destroy')->name('atlet.destroy');
    });

    // Manajemen Pertandingan
    Route::controller(PertandinganController::class)->group(function () {
        Route::get('/kelola-pertandingan', 'index')->name('pertandingan.index');
        Route::get('/tambah/pertandingan', 'create')->name('pertandingan.create');
        Route::post('/simpan/pertandingan', 'store')->name('pertandingan.store');
        Route::get('/edit/pertandingan/{id}', 'edit')->name('pertandingan.edit');
        Route::put('/update/pertandingan/{id}', 'update')->name('pertandingan.update');
        Route::delete('/hapus/pertandingan/{id}', 'destroy')->name('pertandingan.destroy');
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

    // Manajemen Testimoni (Admin)
    Route::controller(TestimonialController::class)->group(function () {
        // Dashboard Utama (Halaman greeting & stats)
        Route::get('/dashboard-view', 'dashboardIndex')->name('dashboard');

        // Halaman List Testimoni Approved
        Route::get('/dashboard/testimonials', 'adminIndex')->name('testi.index');

        // Halaman List Testimoni Pending
        Route::get('/dashboard/testimonials/requests', 'adminRequests')->name('testi.requests');

        // Action Routes
        Route::post('/admin/testimoni/{id}/approve', 'approve')->name('testi.approve');
        Route::post('/admin/testimoni/{id}/reject', 'reject')->name('testi.reject');
        Route::post('/admin/testimoni/{id}/pending', 'makePending')->name('testi.pending');
    });

    // Profile User
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

});

require __DIR__ . '/auth.php';
