<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AuthController;


// Auth Routes

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Registration routes
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'postRegistration']);

// Dashboard route (protected by auth middleware)
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard')->middleware('auth');

// Redirect root to login
Route::get('/', function () {
    return redirect()->route('login');
});


// Student Routes
Route::prefix('students')->name('students.')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('list');
    Route::get('/add', [StudentController::class, 'create'])->name('add');
    Route::post('/store', [StudentController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [StudentController::class, 'edit'])->name('edit');
    Route::put('/{id}/update', [StudentController::class, 'update'])->name('update');
    Route::get('/{id}/view', [StudentController::class, 'show'])->name('view');
    Route::delete('/{id}/delete', [StudentController::class, 'destroy'])->name('delete');
});

// Teacher Routes
Route::prefix('teachers')->name('teachers.')->group(function () {
    Route::get('/', [TeacherController::class, 'index'])->name('list');
    Route::get('/add', [TeacherController::class, 'create'])->name('add');
    Route::post('/store', [TeacherController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [TeacherController::class, 'edit'])->name('edit');
    Route::put('/{id}/update', [TeacherController::class, 'update'])->name('update');
    Route::delete('/{id}/delete', [TeacherController::class, 'destroy'])->name('delete');
});

// Course Routes
Route::prefix('courses')->name('courses.')->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('list');
    Route::get('/add', [CourseController::class, 'create'])->name('add');
    Route::post('/store', [CourseController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [CourseController::class, 'edit'])->name('edit');
    Route::put('/{id}/update', [CourseController::class, 'update'])->name('update');
    Route::get('/{id}/view', [CourseController::class, 'show'])->name('view');
    Route::delete('/{id}/delete', [CourseController::class, 'destroy'])->name('delete');
});


