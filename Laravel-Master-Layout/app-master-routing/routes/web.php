<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function(){
//     return view('index');
// });

// Route::get('/index',function(){
//     return view('students.index1');
// });

// Route::get('',[StudentController::class,'test1']);

Route::get('',[StudentController::class,'index']);

Route::get('/about',[StudentController::class,'about'])->name('about');

// Route::get('/about',[StudentController::class,'about']);