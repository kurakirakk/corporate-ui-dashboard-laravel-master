<?php

use App\Http\Controllers\Admin\MeetingController;
use App\Http\Controllers\Admin\NotulenController;
use App\Http\Controllers\Admin\PegawaiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Models\Notulen;

// Guest routes
Route::middleware('guest')->group(function () {
    Route::get('/', [LoginController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
});

// Authenticated routes
Route::middleware('auth:web')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Pegawai
    Route::prefix('pegawai')->name('pegawai.')->group(function () {
        Route::get('/', [PegawaiController::class, 'index'])->name('index');
        Route::get('/create', [PegawaiController::class, 'create'])->name('create');
        Route::post('/', [PegawaiController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [PegawaiController::class, 'edit'])->name('edit');
        Route::put('/{id}', [PegawaiController::class, 'update'])->name('update');
        Route::delete('/{id}', [PegawaiController::class, 'destroy'])->name('destroy');
    });

    // Rapat
    Route::prefix('rapat')->name('rapat.')->group(function () {
        Route::get('/', [MeetingController::class, 'index'])->name('index');
        Route::get('/create', [MeetingController::class, 'create'])->name('create');
        Route::post('/', [MeetingController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [MeetingController::class, 'edit'])->name('edit');
        Route::put('/{id}', [MeetingController::class, 'update'])->name('update');
        Route::delete('/{id}', [MeetingController::class, 'destroy'])->name('destroy');
        Route::post('/notulen/upload/{meeting_id}', [NotulenController::class, 'store'])->name('notulen.upload');
        Route::get('/{meeting_id}/download-notulen', [NotulenController::class, 'downloadByMeeting'])
            ->name('notulen.download');
    });


    // Notulen
    Route::prefix('notulen-rapat')->name('notulen-rapat.')->group(function () {
        Route::get('/', [NotulenController::class, 'index'])->name('index');
        Route::delete('/{id}', [NotulenController::class, 'destroy'])->name('destroy');
    });
});

// API endpoint user, hanya bisa diakses kalau sudah login
Route::middleware('auth:web')->get('/api/user', [LoginController::class, 'apiUser'])->name('api.user');

Route::middleware('auth:web')->post('/logout', [LoginController::class, 'logout'])->name('logout');
