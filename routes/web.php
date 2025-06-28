<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('pages.plp');
});

Route::get('/home', function () {
    return view('pages.home');
})->name('home');

Route::get('/login', function () {
    return view('pages.login');
})->name('login');

Route::get('/register', function () {
    return view('pages.register');
})->name('register');

Route::get('/shop', function () {
    return view('pages.plp');
})->name('plp');

// ✅ Route PDP pakai controller
Route::get('/product/{id}', [ProductController::class, 'detailPage'])->name('pdp');

// ✅ Route API tetap di file `routes/api.php`, bukan di sini!
