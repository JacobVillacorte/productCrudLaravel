<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SystUserController;
use App\Http\Livewire\ProductLivewire;

// Routes that require authentication
Route::middleware(['auth'])->group(function () {

    // Redirect root to /products
    Route::get('/', function () {
        return redirect()->route('products');
    });

    // Livewire product management
    Route::get('/products', ProductLivewire::class)->name('products');

    // Logout route (POST)
    Route::post('/logout', [SystUserController::class, 'logout'])->name('logout');
});

// Public authentication routes
Route::get('/login', [SystUserController::class, 'login'])->name('login');
Route::post('/login', [SystUserController::class, 'authenticate']);

Route::get('/register', [SystUserController::class, 'register'])->name('register');
Route::post('/register', [SystUserController::class, 'store']);
