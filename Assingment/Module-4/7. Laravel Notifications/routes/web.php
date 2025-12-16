<?php

use App\Http\Controllers\BlogPostController;
use Illuminate\Support\Facades\Route;

Route::post('/posts', [BlogPostController::class, 'store']);
Route::post('/posts/{id}/publish', [BlogPostController::class, 'publish']);