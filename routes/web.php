<?php

use App\Http\Controllers\adminDashboardcontroller;
use App\Http\Controllers\auth\logincontroller;
use App\Http\Controllers\auth\logoutcontroller;
use App\Http\Controllers\auth\registercontroller;
use App\Http\Controllers\coursecontroller;
use App\Http\Controllers\registerationcontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentcontroller;

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


Route::get('/main', function () {
    return view('layout.app.main');
});


Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');


Route::get('/student', function () {
    return view('student.dashboard');
})->name('student');



Route::controller(logincontroller::class)->group(function () {
    Route::get('/', 'view')->name('home');
    Route::get('/login', 'view')->name('login');
    Route::get('/login', 'login');

});

Route::controller(registercontroller::class)->group(function () {
    Route::get('/', 'view')->name('register');
    Route::get('/register', 'register');

});

Route::controller(logoutcontroller::class)->group(function () {
    Route::get('/logout', 'logout')->name('logout');

});

Route::controller(adminDashboardcontroller::class)->group(function () {
    Route::get('/admin/dashboard', 'index')->name('admin.dashboard');

});

Route::controller(coursecontroller::class)->group(function () {
    Route::get('/admin/courses', 'index')->name('admin.courses');
    Route::get('/admin/courses/add', 'create')->name('admin.courses.add');
    Route::post('/admin/courses/add', 'store');
    Route::get('/admin/courses/{course}/edit', 'edit')->name('admin.course.edit');
    Route::post('/admin/courses/{course}/edit', 'update');
    Route::get('/admin/courses/{course}/destroy', 'destroy')->name('admin.course.destroy');

});

Route::controller(studentcontroller::class)->group(function () {
    Route::get('/admin/students', 'index')->name('admin.students');
    Route::get('/admin/students/add', 'create')->name('admin.students.add');
    Route::post('/admin/students/add', 'store');
    Route::get('/admin/student/{student}/edit', 'edit')->name('admin.student.edit');
    Route::post('/admin/student/{student}/edit', 'update');
    Route::get('/admin/student/{student}/destroy', 'destroy')->name('admin.student.destroy');

});


Route::controller(registerationcontroller::class)->group(function () {
    Route::get('/admin/registerations', 'index')->name('admin.registerations');
    Route::get('/admin/registerations/add', 'create')->name('admin.registerations.add');
    Route::post('/admin/registerations/add', 'store');
    Route::get('/admin/registeration/{registeration}/edit', 'edit')->name('admin.registeration.edit');
    Route::post('/admin/registeration/{registeration}/edit', 'update');
    Route::get('/admin/registeration/{registeration}/destroy', 'destroy')->name('admin.registeration.destroy');

});


Route::controller(studentDashboardcontroller::class)->group(function () {
    Route::get('/student/dashboard', 'index')->name('student.dashboard');

});

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
