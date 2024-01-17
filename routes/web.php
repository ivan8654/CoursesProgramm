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

Route::get('/home/create', [HomeController::class, 'create'])->name('course.create');
// Route::post('/home', [HomeController::class, 'store'])->name('course.store');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/home/user-update', [HomeController::class, 'update'])->name('user.update');
Route::post('/store-application', [CoursesController::class, 'store_application'])->name('application.store');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.home');

Route::get('/{course}', [CoursesController::class, 'detail'])->name('course.detail');