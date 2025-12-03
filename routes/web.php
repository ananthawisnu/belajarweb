<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Models\User;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\RegisterController;

// Halaman Welcome
Route::get('/', function () {
    return view('welcome');
});

// Halaman Login (GET) — WAJIB ada name('login')
Route::get('/login', function () {
    return view('login');
})->middleware('guest')->name('login');

// Proses Login (POST)
Route::post('/login', [LoginController::class, 'login']);

// Halaman Admin (dilindungi middleware auth)
Route::get('/login', function () {
    return view('login');
})->name('login');

// Proses Logout
Route::post('/logout', [LogoutController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Dashboard Admin
Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/users',     [UserController::class, 'index'])->name('users');
        Route::get('/settings',  [SettingController::class, 'index'])->name('settings');
    });

// Form register (GET)
Route::get('/register', function () {
    return view('register');
})->middleware('guest')->name('register');

// Proses register (POST)
Route::post('/register', [RegisterController::class, 'store'])
    ->middleware('guest');