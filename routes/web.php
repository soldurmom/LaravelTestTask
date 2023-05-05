<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CatalogController::class, 'show'])->name('catalog');
Route::get('/task/show/{id}', [TaskController::class, 'show'])->name('task.show');

Route::middleware('guest')->group(function() {
    Route::get('/login', function () {
		return view('content.login');
	})->name('view.login');

    Route::get('/register', function () {
		return view('content.register');
	})->name('view.register');

    Route::post('/login', [UserController::class, 'login'])->name('login');
    Route::post('/register', [UserController::class, 'register'])->name('register');
});

Route::middleware('auth')->group(function() {
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    Route::get('/task/create', [TaskController::class, 'create'])->name('task.view.create');
    Route::get('task/update/{id}', [TaskController::class, 'edit'])->name('task.view.update');

    Route::post('/task/create', [TaskController::class, 'store'])->name('task.store');
    Route::put('/task/update/{id}', [TaskController::class, 'update'])->name('task.update');
    Route::delete('/task/delete/{id}', [TaskController::class, 'destroy'])->name('task.destroy');
});