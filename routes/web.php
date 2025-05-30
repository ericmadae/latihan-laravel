<?php 

use App\Http\Controllers\DashboardNewController;
use App\Http\Controllers\LoginNewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterNewController;

Route::middleware(['guest'])->controller( RegisterNewController::class)->group(function () {
    Route::get('/registrasi', 'index')->name('registrasi.index');
    Route::post('/registrasi', 'store')->name('registrasi.store'); //registrasi form arahkan ke sini
});

Route::middleware(['guest'])->controller(LoginNewController::class)->group(function () {
    Route::get('/login', 'index')->name('login.index');
    Route::post('/login', 'store')->name('login.store'); //login form arahkan ke sini
});

Route::middleware(['auth'])->get('dashboard', [DashboardNewController::class, 'index'])->name('dashboard');