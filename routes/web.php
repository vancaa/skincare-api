<?php

use Illuminate\Support\Facades\Route;

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
