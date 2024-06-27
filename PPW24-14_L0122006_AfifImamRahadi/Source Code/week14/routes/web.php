<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('welcome');
}) -> name('welcome');

Route::get('/students', [StudentController::class, 'index'])->middleware('auth')-> name('students');

Route::get('/students/form', [StudentController::class,'create']);

Route::post('/students/add', [StudentController::class,'store']) -> name('add-students');
Route::get('/students/delete/{id}', [StudentController::class,'destroy']);
Route::get('/students/edit/{student}', [StudentController::class,'edit']);
Route::post('/students/update/{student}', [StudentController::class,'update']) -> name('students.update');

// login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

// logout
Route::post('/logout', [LoginController::class, 'logout']);

// register
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
