<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthenticatedController;

Route::middleware('api')->group(function () {
    Route::post('/auth/login', [AuthenticatedController::class, 'store']);

    Route::post('/auth/logout', [AuthenticatedController::class, 'logout'])
        ->middleware('auth:sanctum');
});
