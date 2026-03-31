<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CategoryController;

Route::get('/about', function () {
    return 'Halaman About';
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/', function () {
        return view('starter');
    });

    Route::middleware('role:1')->group(function () {
        Route::get('/category', [CategoryController::class, 'index'])->name('category.index');

        Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');

        Route::post('/category/create', [CategoryController::class, 'store'])->name('category.store');

        Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');

        Route::put('/category/{category}/edit', [CategoryController::class, 'update'])->name('category.update');

        Route::delete('/category/{category}/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');

        Route::get('/student', [StudentController::class, 'index']);
    });
});

require __DIR__ . '/auth.php';
