<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
}) -> name('welcome');

Route::get('/students', [StudentController::class, 'index']) -> name('students');

Route::get('/students/form', function () {
    return view('student.form');
});

Route::post('/students/add', [StudentController::class,'store']) -> name('add-students');
Route::get('/students/delete/{id}', [StudentController::class,'destroy']);
Route::get('/students/edit/{student}', [StudentController::class,'edit']);
Route::post('/students/update/{student}', [StudentController::class,'update']) -> name('students.update');
