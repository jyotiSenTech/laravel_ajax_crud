<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\StudentController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [EmployeeController::class, 'index'])->name('employee_register');
Route::match(['get', 'post'], '/employee/{action}/{id?}', [EmployeeController::class, 'employee_crud'])
    ->name('employee_crud');

// Route::post('/emp_create', [EmployeeController::class, 'employee_create'])->name('employee_create');
// Route::get('/emp_list', action: [EmployeeController::class, 'employee_show'])->name('employee_list');
// Route::get('/emp_edit/{id}', action: [EmployeeController::class, 'employee_edit'])->name('employee_edit');
// Route::post('/emp_update/{id}', action: [EmployeeController::class, 'employee_update'])->name('employee_update');
// Route::get('/emp_delete/{id}', action: [EmployeeController::class, 'employee_delete'])->name('employee_delete');



Route::get('/student_register', [StudentController::class, 'index'])->name('student_register');
Route::post('/student_create', [StudentController::class, 'student_create'])->name('student_create');
Route::get('/student_list', action: [StudentController::class, 'student_show'])->name('student_list');
Route::get('/student_edit/{id}', action: [StudentController::class, 'student_edit'])->name('student_edit');
Route::post('/student_update/{id}', action: [StudentController::class, 'student_update'])->name('student_update');
Route::post('/student_delete/{id}', action: [StudentController::class, 'student_delete'])->name('student_delete');
