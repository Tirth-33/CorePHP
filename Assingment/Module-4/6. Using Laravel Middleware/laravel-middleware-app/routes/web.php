<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Test routes
Route::get('/setup', [TestController::class, 'createUsers']);
Route::get('/login-admin', [TestController::class, 'loginAdmin']);
Route::get('/login-user', [TestController::class, 'loginUser']);

// Protected admin route
Route::get('/admin-test', [TestController::class, 'adminDashboard'])
    ->middleware(['admin']);

// Check current user
Route::get('/whoami', function() {
    if (auth()->check()) {
        return 'Logged in as: ' . auth()->user()->name . ' (Role: ' . auth()->user()->role . ')';
    }
    return 'Not logged in';
});
