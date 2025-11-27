<?php

use App\Http\Controllers\assessment\Api\CompanyApiController;
use Illuminate\Support\Facades\Route;

Route::get('/company/{id}', [CompanyApiController::class, 'show']);

// Testing API
Route::get('/test', function() {
    return response()->json(['status' => 'ok']);
});

