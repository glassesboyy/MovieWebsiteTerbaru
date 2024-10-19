<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Hal User Sebelum Login
Route::get('/', function () {
    return view('welcome');
});
// Hal User Sebelum Login End

// Hal User Setelah Login (Dibatasi dengan middleware auth)
Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');
// Hal User Setelah Login End

// Bagian Registrasi
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register/submit', [AuthController::class, 'submitRegister'])->name('register.submit');
// Bagian Registrasi End

// Bagian Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login/submit', [AuthController::class, 'submitLogin'])->name('login.submit');
// Bagian Login End

// Bagian Logout (Dibatasi dengan middleware auth)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
// Bagian Logout End

// CRUD Product (Dibatasi dengan middleware auth)
Route::resource('/products', \App\Http\Controllers\ProductController::class)->middleware('auth');
// CRUD Product End

// CRUD Movie (Dibatasi dengan middleware auth)
Route::resource('/movies', \App\Http\Controllers\MovieController::class)->middleware('auth');
// CRUD Movie End
