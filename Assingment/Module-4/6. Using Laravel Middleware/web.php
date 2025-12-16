<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

// Register middleware in Kernel.php first:
// protected $routeMiddleware = [
//     'admin' => \App\Http\Middleware\AdminMiddleware::class,
// ];

// Apply middleware to specific routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/admin/users', [AdminController::class, 'users']);
    Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser']);
});

// Apply middleware to individual route
Route::get('/admin/settings', [AdminController::class, 'settings'])
    ->middleware(['auth', 'admin']);