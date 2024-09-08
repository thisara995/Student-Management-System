<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;



// Admin Routes
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'submit_login'])->name('admin.submit_login');
Route::get('/admin/register', [AdminController::class, 'register'])->name('admin.register');
Route::get('/admin/forget_password', [AdminController::class, 'forget_password'])->name('admin.forget_password');
Route::get('/admin/setting', [AdminController::class, 'setting'])->name('admin.setting');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Admin management routes for adding, editing, and deleting Admin users
Route::get('admin/users/add', [AdminController::class, 'create'])->name('admin.users.add');
Route::post('admin/users/store', [AdminController::class, 'store'])->name('admin.users.store');
Route::get('admin/users/{id}/edit', [AdminController::class, 'edit'])->name('admin.users.edit');
Route::put('admin/users/{id}/update', [AdminController::class, 'update'])->name('admin.users.update');
Route::get('admin/users/{id}/view', [AdminController::class, 'show'])->name('admin.users.view');
Route::delete('admin/users/{id}/delete', [AdminController::class, 'destroy'])->name('admin.users.delete');



// Student Routes
Route::get('/students', [StudentController::class, 'index'])->name('students.list');
Route::get('/students/add', [StudentController::class, 'create'])->name('students.add');
Route::post('/students/store', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{id}/update', [StudentController::class, 'update'])->name('students.update');
Route::get('/students/{id}/view', [StudentController::class, 'show'])->name('students.view');
Route::delete('/students/{id}/delete', [StudentController::class, 'destroy'])->name('students.delete');

