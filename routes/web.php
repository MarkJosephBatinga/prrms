<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\RegistrarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

// Login Routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login/post', [AuthController::class, 'login_post'])->name('login_post');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register/post', [AuthController::class, 'register_post'])->name('register_post');
Route::get('/register/get_course/{id}', [AuthController::class, 'get_courses'])->name('get_courses');
Route::get('/credentials/{student_id}/{password}', [AuthController::class, 'show_credentials'])->name('show_credentials');


Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Records
    Route::get('/records', [RecordController::class, 'index'])->name('records');
    Route::get('/records/pre_register', [RecordController::class, 'pre_register'])->name('pre_register');

    // Programs
    Route::get('/programs', [ProgramController::class, 'index'])->name('programs');
    Route::get('/programs/add', [ProgramController::class, 'add_program'])->name('add_program');
    Route::get('/programs/view/{id}', [ProgramController::class, 'view'])->name('view_program');

    // Programs
    Route::get('/courses', [CourseController::class, 'index'])->name('courses');
    Route::get('/courses/add', [CourseController::class, 'add_course'])->name('add_course');
    Route::get('/courses/view/{id}', [CourseController::class, 'view'])->name('view_course');

     // Registrar
     Route::get('/grades', [RegistrarController::class, 'grades_index'])->name('grades');
     Route::get('/grades/view/{id}', [RegistrarController::class, 'view_grades'])->name('view_grades');
});
