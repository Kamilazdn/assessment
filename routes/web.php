<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\assessment\CompanyController;
use App\Http\Controllers\assessment\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('company', CompanyController::class);
    Route::resource('employee', EmployeeController::class);
});

require __DIR__.'/auth.php';
