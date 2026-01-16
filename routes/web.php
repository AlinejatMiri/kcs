<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminAuth;

Route::get('/', function () {
    return view('index');
})->name('home');

// Admin login routes
Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin');
Route::post('/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Protected admin routes (only logged-in admins can access)
Route::middleware(AdminAuth::class)->group(function () {
    // Admin dashboard for managing products
    Route::get('/admin/dashboard', [ProductController::class, 'dashboard'])->name('admin.dashboard');

    // Product CRUD routes
    Route::post('/admin/products', [ProductController::class, 'store'])->name('products.store');
    Route::put('/admin/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/admin/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});
