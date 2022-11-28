<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LecturerController;

Route::get('/', function () {
    return view('index');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/students', [StudentController::class, 'index'])->name('students.index')->middleware('auth');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create')->middleware('auth');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show')->middleware('auth');
Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit')->middleware('auth');
Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');

Route::get('/login', [AuthController::class, 'index'])->name('auth.index')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/signup', [AuthController::class, 'create'])->name('auth.create')->middleware('guest');
Route::post('/signup', [AuthController::class, 'signup'])->name('auth.signup');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');


Route::get('/index', [LecturerController::class, 'index']);
Route::get('/create', [LecturerController::class, 'create']);
Route::get('/show', [LecturerController::class, 'show']);

Route::get('/jadwal', [JadwalController::class, 'index'])->middleware('auth');
