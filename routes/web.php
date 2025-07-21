<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SimpleAuthController;
use App\Http\Controllers\NoCSRFAuthController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\TestRegister;
use App\Livewire\Products;

// Debug route
Route::get('/debug-csrf', function() {
    return response()->json([
        'csrf_token' => csrf_token(),
        'session_id' => session()->getId(),
        'session_started' => session()->isStarted(),
        'session_driver' => config('session.driver'),
    ]);
});

// Redirect root to products for authenticated users
Route::middleware(['auth'])->group(function () {
    Route::get('/', Products::class)->name('home');
    Route::get('/products', Products::class)->name('products');
    Route::get('/products/create', \App\Livewire\Products\Create::class)->name('products.create');
    Route::get('/products/{product}', \App\Livewire\Products\Show::class)->name('products.show');
    Route::get('/products/{product}/edit', \App\Livewire\Products\Edit::class)->name('products.edit');
});

// Authentication routes (guests only)
Route::middleware(['guest'])->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
    Route::get('/test-register', TestRegister::class)->name('test-register');
    
    // Simple traditional registration test
    Route::get('/simple-register', [SimpleAuthController::class, 'showRegister'])->name('simple.register.form');
    Route::post('/simple-register', [SimpleAuthController::class, 'register'])->name('simple.register');
    
    // No CSRF test
    Route::get('/no-csrf-register', [NoCSRFAuthController::class, 'showRegister'])->name('no-csrf.register.form');
    Route::post('/no-csrf-register', [NoCSRFAuthController::class, 'register'])->name('no-csrf.register');
});

// Catch-all redirect for authenticated users
Route::middleware(['auth'])->get('/{any}', function () {
    return redirect()->route('products');
})->where('any', '.*');
