<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KrskhsController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:dosen,mahasiswa'])->group(function () {
 Route::get('/krskhs/pdf', [KrsKhsController::class, 'pdf'])->name('krskhs.pdf');
 Route::resource('registrasi', RegistrasiController::class);
 Route::resource('krskhs', KrsKhsController::class);
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('registrasi', RegistrasiController::class)->middleware(['auth']);

Route::middleware(['auth', 'role:dosen'])->group(function () {
    Route::get('/dashboard-dosen', [DosenController::class, 'index']);
    Route::resource('mahasiswa', MahasiswaController::class);
});

// Route::middleware(['auth', 'role:dosen,mahasiswa'])->group(function () {
//     Route::resource('registrasi', RegistrasiController::class);
//     Route::resource('krskhs', KrsKhsController::class);
//     Route::get('/krskhs/pdf', [KrsKhsController::class, 'pdf'])->name('krskhs.pdf');
// });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';
