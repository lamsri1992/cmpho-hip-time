<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\hipController;

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