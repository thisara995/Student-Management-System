<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BatchesController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DashboardController;



// Auth Routes


Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.post');
Route::get('/profile', [AuthController::class, 'showProfile'])->name('profile');
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [AuthController::class, 'dashboard'])->middleware('auth')->name('dashboard');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::put('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');

// Dashboard Route 

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');


// User management routes
Route::get('/users', [AuthController::class, 'user_index'])->name('users.index');
Route::get('/users/add', [AuthController::class, 'showAddUserForm'])->name('users.add');
Route::post('/users/add', [AuthController::class, 'addUser'])->name('users.store');
Route::get('/users/{id}/edit', [AuthController::class, 'editUser'])->name('users.edit');
Route::put('/users/{id}/update', [AuthController::class, 'updateUser'])->name('users.update');
Route::delete('/users/{id}', [AuthController::class, 'deleteUser'])->name('users.delete');



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
    Route::get('/{id}/view', [TeacherController::class, 'show'])->name('view');
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


// Batch Routes
Route::get('/batches', [BatchesController::class, 'index'])->name('batches.list');
Route::get('batches/add', [BatchesController::class, 'create'])->name('batches.add'); // Show form
Route::post('batches/add', [BatchesController::class, 'store'])->name('batches.store'); // Submit form
Route::get('/batches/{id}/edit', [BatchesController::class, 'edit'])->name('batches.edit');
Route::get('batches/{id}/view', [BatchesController::class, 'show'])->name('batches.view');
Route::put('/batches/{id}', [BatchesController::class, 'update'])->name('batches.update'); // Update route with PUT
Route::delete('/batches/{id}/delete', [BatchesController::class, 'destroy'])->name('batches.destroy');


// Enrollments  Routes
Route::get('/enrollments', [EnrollmentController::class, 'index'])->name('enrollments.list');
Route::get('enrollments/add', [EnrollmentController::class, 'create'])->name('enrollments.add'); // Show form
Route::post('enrollments/add', [EnrollmentController::class, 'store'])->name('enrollments.store'); // Submit form
Route::get('/enrollments/{id}/edit', [EnrollmentController::class, 'edit'])->name('enrollments.edit');
Route::get('enrollments/{id}/view', [EnrollmentController::class, 'show'])->name('enrollments.view');
Route::put('/enrollments/{id}', [EnrollmentController::class, 'update'])->name('enrollments.update'); // Update route with PUT
Route::delete('/enrollments/{id}/delete', [EnrollmentController::class, 'destroy'])->name('enrollments.destroy');

// Payments  Routes
Route::get('/payments', [PaymentsController::class, 'index'])->name('payments.list');
Route::get('payments/add', [PaymentsController::class, 'create'])->name('payments.add'); 
Route::post('payments/add', [PaymentsController::class, 'store'])->name('payments.store'); 
Route::get('/payments/{id}/edit', [PaymentsController::class, 'edit'])->name('payments.edit');
Route::get('payments/{id}/view', [PaymentsController::class, 'show'])->name('payments.view');
Route::put('/payments/{id}', [PaymentsController::class, 'update'])->name('payments.update'); 
Route::delete('/payments/{id}/delete', [PaymentsController::class, 'destroy'])->name('payments.destroy');

// Report Route for Payments
Route::get('/payments/{id}/report', [ReportController::class, 'report'])->name('payments.report');



