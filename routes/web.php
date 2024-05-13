<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\RegistrarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\SchoolYearController;
use App\Http\Controllers\SemesterController;

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
Route::get('register/new_student', [AuthController::class, 'new_student'])->name('new_student');
Route::post('/register/post', [AuthController::class, 'register_post'])->name('register_post');
Route::get('/register/get_course/{id}', [AuthController::class, 'get_courses'])->name('get_courses');
Route::get('/credentials/{student_id}/{password}', [AuthController::class, 'show_credentials'])->name('show_credentials');


Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Records
    Route::get('/records', [RecordController::class, 'index'])->name('records');
    Route::get('/records/student_status/{status}', [RecordController::class, 'filter_student'])->name('filter_student');
    Route::get('/records/pre_register', [RecordController::class, 'pre_register'])->name('pre_register');
    Route::get('/records/view/{id}', [RecordController::class, 'view'])->name('view_record');
    Route::get('/records/edit/{id}', [RecordController::class, 'edit_record'])->name('edit_record');
    Route::get('/records/get_student_course/{programId}/{studentId}', [RecordController::class, 'get_courses'])->name('get_student_courses');
    Route::post('/records/update', [RecordController::class, 'update_record'])->name('update_record');
    Route::get('/records/delete/{id}', [RecordController::class, 'delete_record'])->name('delete_record');
    Route::post('/records/update/approval', [RecordController::class, 'edit_approval'])->name('edit_approval');

    // Programs
    Route::get('/programs', [ProgramController::class, 'index'])->name('programs');
    Route::get('/programs/add', [ProgramController::class, 'add_program'])->name('add_program');
    Route::get('/programs/edit/{id}', [ProgramController::class, 'edit_program'])->name('edit_program');
    Route::get('/programs/view/{id}', [ProgramController::class, 'view'])->name('view_program');
    Route::post('/programs/create', [ProgramController::class, 'create_program'])->name('create_program');
    Route::post('/programs/update', [ProgramController::class, 'update_program'])->name('update_program');
    Route::get('/programs/delete/{id}', [ProgramController::class, 'delete_program'])->name('delete_program');


    // Courses
    Route::get('/courses', [CourseController::class, 'index'])->name('courses');
    Route::get('/courses/add', [CourseController::class, 'add_course'])->name('add_course');
    Route::get('/courses/edit/{id}', [CourseController::class, 'edit_course'])->name('edit_course');
    Route::get('/courses/view/{id}', [CourseController::class, 'view'])->name('view_course');
    Route::post('/courses/create', [CourseController::class, 'create_course'])->name('create_course');
    Route::post('/courses/update', [CourseController::class, 'update_course'])->name('update_course');
    Route::get('/courses/delete/{id}', [CourseController::class, 'delete_course'])->name('delete_course');

    // Registrar
    Route::get('/grades', [RegistrarController::class, 'grades_index'])->name('grades');
    Route::get('/grades_remarks_by_course', [RegistrarController::class, 'grades_remarks_by_course'])->name('grades_remarks_by_course');
    Route::get('/grades/view/{id}', [RegistrarController::class, 'view_grades'])->name('view_grades');
    Route::get('/grades/filter_term/{term}/{id}', [RegistrarController::class, 'get_filtered_grades'])->name('get_filtered_grades');


    //  Students
    Route::get('/student/pre-register', [RecordController::class, 'student_record'])->name('student_record');

    Route::get('/student/courses', [CourseController::class, 'student_course'])->name('student_course');
    Route::get('/student/course/view/{id}', [CourseController::class, 'student_view'])->name('student_course_view');
    Route::get('/student/profile', [AuthController::class, 'profile_view'])->name('profile_view');
    Route::get('/student/profile/edit', [AuthController::class, 'profile_edit'])->name('profile_edit');
    Route::post('/student/profile/update', [AuthController::class, 'profile_update'])->name('profile_update');

    Route::get('/student/grades', [RegistrarController::class, 'student_grades'])->name('student_grades');
    Route::post('/download', [DownloadController::class, 'download_file'])->name('download_file');
    Route::post('/view_file', [DownloadController::class, 'view_file'])->name('view_file');

    // Users

    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/users/add', [UserController::class, 'add_user'])->name('add_user');
    Route::post('/users/create', [UserController::class, 'create_user'])->name('create_user');
    Route::get('/users/edit/{id}', [UserController::class, 'edit_user'])->name('edit_user');
    Route::post('/users/update', [UserController::class, 'update_user'])->name('update_user');
    Route::get('/users/delete/{id}', [UserController::class, 'delete_user'])->name('delete_user');


    // School Year

    Route::get('/school_year', [SchoolYearController::class, 'index'])->name('school_year');
    Route::get('/school_year/add', [SchoolYearController::class, 'add_school_year'])->name('add_school_year');
    Route::post('/school_year/create', [SchoolYearController::class, 'create_school_year'])->name('create_school_year');
    Route::get('/school_year/edit/{id}', [SchoolYearController::class, 'edit_school_year'])->name('edit_school_year');
    Route::post('/school_year/update', [SchoolYearController::class, 'update_school_year'])->name('update_school_year');
    Route::get('/school_year/delete/{id}', [SchoolYearController::class, 'delete_school_year'])->name('delete_school_year');
    Route::post('/school_year/import', [SchoolYearController::class, 'import'])->name('import_school_year');

    // Semester

    Route::get('/semester', [SemesterController::class, 'index'])->name('semester');
    Route::get('/semester/add', [SemesterController::class, 'add_semester'])->name('add_semester');
    Route::post('/semester/create', [SemesterController::class, 'create_semester'])->name('create_semester');
    Route::get('/semester/edit/{id}', [SemesterController::class, 'edit_semester'])->name('edit_semester');
    Route::post('/semester/update', [SemesterController::class, 'update_semester'])->name('update_semester');
    Route::get('/semester/delete/{id}', [SemesterController::class, 'delete_semester'])->name('delete_semester');
    Route::post('/semester/import', [SemesterController::class, 'import'])->name('import_semester');


    // Pre register (Program and Course Listing)
    Route::get('/pre_register_setup', [ProgramController::class, 'pre_register_setup'])->name('pre_register_setup');
    Route::post('/update_program_listing_status', [ProgramController::class, 'update_program_listing_status'])->name('update_program_listing_status');
    Route::post('/update_course_listing_status', [CourseController::class, 'update_course_listing_status'])->name('update_course_listing_status');

});
