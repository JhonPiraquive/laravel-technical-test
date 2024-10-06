<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Redirect to login
Route::get('/', function () {
    return redirect('login');
});

// Authentication routes for guests
Route::middleware('guest')->group(function () {
    Route::get('register', [AuthController::class, 'register'])
        ->name('register');

    Route::post('register', [AuthController::class, 'store'])
        ->name('register.store');

    Route::get('login', [AuthController::class, 'index'])
        ->name('login');

    Route::post('login', [AuthController::class, 'login'])
        ->name('login.store');

    Route::get('forgot-password', [ForgotPasswordController::class, 'index'])
        ->name('password.request');

    Route::post('forgot-password', [ForgotPasswordController::class, 'sendLink'])
        ->name('password.email');

    Route::get('reset-password/{token}', [ResetPasswordController::class, 'index'])
        ->name('password.reset');

    Route::post('reset-password', [ResetPasswordController::class, 'reset'])
        ->name('password.store');
});

// Routes for authenticated users
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('logout', [AuthController::class, 'logout'])
        ->name('logout');

    // User Routes
    Route::get('/user', [UserController::class, 'edit'])->name('user.edit');
    Route::patch('/user', [UserController::class, 'update'])->name('user.update');
    Route::put('password', [UserController::class, 'updatePassword'])
        ->name('password.update');

    // Customer Routes
    Route::prefix('/customer')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('customer.index');
        Route::get('/create', [CustomerController::class, 'create'])->name('customer.create');
        Route::get('/edit/{customer}', [CustomerController::class, 'edit'])->name('customer.edit');
        Route::get('/view/{customer}', [CustomerController::class, 'view'])->name('customer.view');
        Route::post('store/', [CustomerController::class, 'store'])->name('customer.store');
        Route::patch('/{customer}', [CustomerController::class, 'update'])->name('customer.update');
        Route::delete('/{customer}', [CustomerController::class, 'delete'])->name('customer.delete');
    });
});
