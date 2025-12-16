<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', function () {
    return 'Laravel Admin Middleware Example';
});

// Authentication
Route::get('/login-admin', [AuthController::class, 'loginAdmin']);
Route::get('/login-user', [AuthController::class, 'loginUser']);
Route::get('/logout', [AuthController::class, 'logout']);

// Admin routes (protected by admin middleware)
Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/users', [AdminController::class, 'users']);
    Route::delete('/users/{id}', [AdminController::class, 'deleteUser']);
});

// Check current user
Route::get('/whoami', function () {
    if (auth()->check()) {
        return 'Logged in as: ' . auth()->user()->name . ' (Role: ' . auth()->user()->role . ')';
    }
    return 'Not logged in';
});
