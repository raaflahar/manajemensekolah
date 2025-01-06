<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SessionController;
use App\Models\Guru;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::get('/', [SessionController::class, 'index']);
Route::post('/', [SessionController::class, 'login']);
Route::get('/admin', [IndexController::class, 'index']);
Route::get('logout', [SessionController::class, 'logout']);

Route::get('/admin/create', [AdminController::class, 'create']);
Route::post('/siswa', [AdminController::class, 'store']);
Route::get('/siswa/{nama}/edit', [AdminController::class, 'edit'])->name('siswa.edit');
Route::put('/siswa/{nama}/edit', [AdminController::class, 'edit'])->name('siswa.edit');
Route::put('/siswa/{nama}', [AdminController::class, 'update'])->name('siswa.update');
Route::delete('/siswa/{nama}', [AdminController::class, 'destroy'])->name('siswa.destroy');

Route::get('/admin/created', [GuruController::class, 'create']);
Route::post('/guru', [GuruController::class, 'store']);
Route::get('/guru/{guru}/edit', [GuruController::class, 'edit']);
Route::put('/guru/{guru}/edit', [GuruController::class, 'edit']);
Route::put('/guru/{guru}', [GuruController::class, 'update']);
Route::delete('/guru{guru}', [GuruController::class, 'destroy']);




Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
