<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

// 🏠 Halaman Utama & Navigasi Umum
Route::get('/', function () {
    return view('pages.plp');
});

Route::get('/home', function () {
    return view('pages.home');
})->name('home');

Route::get('/shop', function () {
    return view('pages.plp');
})->name('plp');

// 🛍️ Halaman Produk (PDP - Product Detail Page)
Route::get('/product/{id}', [ProductController::class, 'detailPage'])
    ->name('pdp');

// 👤 Autentikasi (Login & Register)
Route::get('/login', function () {
    return view('pages.login');
})->name('login');

Route::get('/register', function () {
    return view('pages.register');
})->name('register');

// ✅ Halaman Profile (Login via Cookie Token, BUKAN Laravel Auth)
Route::get('/my-profile', [ProfileController::class, 'show'])->name('profile');

// (Opsional) Halaman Edit Profile
Route::get('/edit-profile', [ProfileController::class, 'edit'])->name('profile.edit');

// (Opsional) Aksi Update Profile
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

// (Opsional) Aksi Delete Akun
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
