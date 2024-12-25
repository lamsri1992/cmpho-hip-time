<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\hipController;

Route::get('dashboard', [hipController::class, 'dashboard'])->name('dashboard');
Route::get('employee', [hipController::class, 'employee'])->name('employee');
Route::get('report', [hipController::class, 'report'])->name('report');
Route::get('report/search', [hipController::class, 'search'])->name('search');
