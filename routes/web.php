<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\hipController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


Route::get('/', [hipController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('/')->group(function () {
    Route::get('dashboard', [hipController::class, 'dashboard'])->name('dashboard');
});

Route::prefix('report')->group(function () {
    Route::get('', [hipController::class, 'report'])->name('report');
    Route::get('search', [hipController::class, 'search'])->name('search');
});

Route::prefix('employee')->group(function () {
    Route::get('/', [hipController::class, 'employee'])->name('employee');
    Route::post('store', [hipController::class, 'store_employee'])->name('employee.store');
    Route::get('view/{id}', [hipController::class, 'show_employee'])->name('employee.show');
    Route::post('update/{id}', [hipController::class, 'update_employee'])->name('employee.update');
});

require __DIR__.'/auth.php';
