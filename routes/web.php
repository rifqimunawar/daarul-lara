<?php

use App\Http\Controllers\CategoryCourceController;
use App\Http\Controllers\CourceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/category-cources', [CategoryCourceController::class, 'index'])->name('index.category-cources');
Route::get('/dashboard/category/create', [CategoryCourceController::class, 'create'])->name('create.category-cources');
Route::post('/dashboard/category/store', [CategoryCourceController::class, 'store'])->name('store.category-cources');
Route::get('/dashboard/category/{id}/edit', [CategoryCourceController::class, 'edit'])->name('edit.category-cources');
Route::put('/dashboard/category/{id}/update', [CategoryCourceController::class, 'update']);
Route::delete('/dashboard/category/destroy/{id}', [CategoryCourceController::class, 'destroy'])->name('category-cources.destroy');


Route::get('/dashboard/cource', [CourceController::class, 'index'])->name('index.cource');
Route::get('/dashboard/cource/create', [CourceController::class, 'create'])->name('create.cource');
Route::post('/dashboard/cource/store', [CourceController::class, 'store'])->name('store.cource');
Route::get('/dashboard/cource/{id}/edit', [CourceController::class, 'edit'])->name('edit.cource');
Route::put('/dashboard/cource/{id}/update', [CourceController::class, 'update']);
Route::delete('/dashboard/cource/destroy/{id}', [CourceController::class, 'destroy'])->name('cource.destroy');

Route::get('/dashboard/teacher', [TeacherController::class, 'index'])->name('index.teacher');
Route::get('/dashboard/teacher/create', [TeacherController::class, 'create'])->name('create.teacher');
Route::post('/dashboard/teacher/store', [TeacherController::class, 'store'])->name('store.teacher');
Route::get('/dashboard/teacher/{id}/edit', [TeacherController::class, 'edit'])->name('edit.teacher');
Route::put('/dashboard/teacher/{id}/update', [TeacherController::class, 'update']);
Route::delete('/dashboard/teacher/destroy/{id}', [TeacherController::class, 'destroy'])->name('teacher.destroy');