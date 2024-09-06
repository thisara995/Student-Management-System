<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Models\Student;


// Student Routes
Route::get('/students', [StudentController::class, 'index'])->name('students.list');
Route::get('/students/add', [StudentController::class, 'create'])->name('students.add');
Route::post('/students/store', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{id}/update', [StudentController::class, 'update'])->name('students.update');
Route::get('/students/{id}/view', [StudentController::class, 'show'])->name('students.view');
Route::delete('/students/{id}/delete', [StudentController::class, 'destroy'])->name('students.delete');

