<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;



// Registration Routes
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Login Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Logout Route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::get('/',[TaskController::class,'index'])->name('tasks.index')->middleware('auth');
Route::get('/tasks',[TaskController::class,'index'])->name('tasks.index')->middleware('auth');
Route::get('/tasks/create',[TaskController::class,'create'])->name('tasks.create')->middleware('auth');
Route::post('/tasks',[TaskController::class,'store'])->name('tasks.store')->middleware('auth');

Route::get('/tasks/{task}',[TaskController::class,'edit'])->name('tasks.edit')->middleware('auth');
Route::put('/tasks/{task}',[TaskController::class,'update'])->name('tasks.update')->middleware('auth');

Route::delete('/tasks/{task}',[TaskController::class,'destroy'])->name('tasks.destroy')->middleware('auth');

Route::post('/tasks/{task}/complete',[TaskController::class,'complete'])->name('tasks.complete')->middleware('auth');

Route::get('/taskshow',[TaskController::class,'showCompleted'])->name('taskshow')->middleware('auth');
