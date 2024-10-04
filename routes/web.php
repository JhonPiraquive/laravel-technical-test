<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

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

require __DIR__ . '/auth.php';
