<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [CoursesController::class, 'index'])->name('index');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/home/user/update', [HomeController::class, 'update'])->name('user.update');
Route::post('/application/create', [CoursesController::class, 'store_application'])->name('application.store');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.home');
Route::get('/course/create', [AdminController::class, 'create_course'])->name('course.menu');
Route::get('/category/create', [AdminController::class, 'create_category'])->name('category.create');
Route::post('/application/reject', [AdminController::class, 'reject_application'])->name('application.reject');
Route::post('/application/approve', [AdminController::class, 'approve_application'])->name('application.approve');

Route::get('/courses', [AdminController::class, 'courses'])->name('courses');
Route::get('/course/add', [AdminController::class, 'add_course_page'])->name('course.addpage');
Route::get('/course/edit/{course}', [AdminController::class, 'edit_course_page'])->name('course.editpage');
Route::get('/course/create', [AdminController::class, 'create_course_page'])->name('course.createpage');
Route::delete('/courses', [AdminController::class, 'delete_course'])->name('course.delete');
Route::post('/course/edit/save', [AdminController::class, 'course_edit'])->name('course.edit');
Route::post('/course/create/save', [AdminController::class, 'course_create'])->name('course.create');

Route::get('/category/add', [AdminController::class, 'create_category_page'])->name('category.createpage');
Route::post('/category/add/save', [AdminController::class, 'category_create'])->name('category.create');

Route::get('/{course}', [CoursesController::class, 'detail'])->name('course.detail');