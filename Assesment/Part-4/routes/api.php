<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\GradeController;
use App\Http\Controllers\Api\SubjectController;

// API v1 routes
Route::prefix('v1')->group(function () {
    // Public routes
    Route::post('/login', [AuthController::class, 'login']);

    // Protected routes
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/grades', [GradeController::class, 'index']);
        Route::get('/grades/{id}', [GradeController::class, 'show']);
        Route::get('/subjects', [SubjectController::class, 'index']);
    });
});