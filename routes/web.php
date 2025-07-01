<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SystUserController;

Route::get('/login', [SystUserController::class, 'login'])->name('login');
Route::post('/login', [SystUserController::class, 'authenticate']);
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::get('/register', [SystUserController::class, 'register'])->name('register');
Route::post('/register', [SystUserController::class, 'store']);

Route::middleware(['auth'])->group(function () {
    Route::post('logout', [SystUserController::class, 'logout'])->name('logout');
    
    Route::get('/', function () {
        return redirect(route('products.index')); 
    });
    
    Route::resource('products', ProductController::class);
});             