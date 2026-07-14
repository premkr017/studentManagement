<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

// Home Page Route
Route::get('/', function () {
    return view('welcome');
});

// Resources Routes
Route::resource('students', StudentController::class);
Route::resource('courses', CourseController::class);
