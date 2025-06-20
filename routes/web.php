<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Halaman Awal & Register
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('pages.auth.login');
});

Route::get('/register', [RegisterController::class, 'create'])->name('register');

/*
|--------------------------------------------------------------------------
| Halaman Setelah Login (Dashboard Umum)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

/*
|--------------------------------------------------------------------------
| Admin Route (Role: Admin Saja)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource('category', CategoryController::class);
    Route::resource('question', QuestionController::class);
});
