<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;

Route::prefix('api/user')->group(function () {
    Route::post('/register', [AuthController::class, 'register']); // ✅ Sekarang path-nya /api/user/register
    Route::post('/login', [AuthController::class, 'login']);
});

// Sisanya tetap sama...
// Endpoint Auth (tidak butuh token)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Endpoint publik: lihat semua produk
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product}', [ProductController::class, 'show']);

// Endpoint yang butuh login
Route::middleware('auth:sanctum')->group(function () {
    // ✅ Lihat user yang sedang login & logout
    Route::get('/whoami', [AuthController::class, 'whoami']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // ✅ Admin & reseller bisa tambah dan edit produk
    Route::middleware(['role:admin,reseller'])->group(function () {
        Route::post('/products', [ProductController::class, 'store']);
        Route::put('/products/{product}', [ProductController::class, 'update']);
    });

    // ✅ Hanya admin yang bisa hapus produk
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])
        ->middleware(['role:admin']);

    // ✅ Customer dan admin bisa checkout
    Route::post('/checkout', [OrderController::class, 'store'])
        ->middleware(['role:admin,customer']);

    // ✅ Admin bisa ubah role user
    Route::put('/users/{user}/role', [AdminController::class, 'updateRole'])
        ->middleware(['role:admin']);
        
});