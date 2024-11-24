<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

// Route untuk halaman utama (dapat diakses semua user)
Route::get('/', [MovieController::class, 'home'])->name('home');

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
    Route::get('/home', [MovieController::class, 'home'])->name('home'); // Menggunakan controller

    // Route Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Route CRUD Movie
    Route::resource('/movies', MovieController::class);

    // Route untuk menampilkan film
    Route::get('/movies/{id}/show', [MovieController::class, 'show'])->name('movies.show');

    // Route untuk booking film
    Route::get('/movies/{id}/booking', [MovieController::class, 'booking'])->name('movies.booking');

    // Route CRUD Customer
    Route::resource('/customers', CustomerController::class);
});

// Route Error 404
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
