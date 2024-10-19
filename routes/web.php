<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CustomersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Route untuk halaman utama (dapat diakses semua user)
Route::get('/', function () {
    return view('home');
})->name('home');

// Grup route untuk tamu (belum login)
Route::middleware('guest')->group(function () {
    // Route Registrasi
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register/submit', [AuthController::class, 'submitRegister'])->name('register.submit');

    // Route Login
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login/submit', [AuthController::class, 'submitLogin'])->name('login.submit');
});

// Grup route untuk user yang sudah login
Route::middleware('auth')->group(function () {
    // Route Home setelah login
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    // Route Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Route CRUD Movie
    Route::resource('/movies', MovieController::class);

    // Route untuk menampilkan film
    Route::get('/movies/{id}/show', [MovieController::class, 'show'])->name('movies.show');

    // Route untuk booking film (jika diperlukan)
    Route::get('/movies/{id}/booking', [MovieController::class, 'booking'])->name('movies.booking');
});

Route::resource('/customers', \App\Http\Controllers\CustomersController::class);

// Route Error 404 (Optional)
Route::fallback(function () {
    return view('errors.404');
});