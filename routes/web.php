<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\registerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.auth.login');
});

Route::get('/home', [homeController::class, 'index'])->name('home');
Route::get('/register', [registerController::class, 'create'])->name('register');

Route::resource('category', CategoryController::class);

// aktifin klo pronen udh jadi

// Route::middleware(['auth', 'role:admin'])->get('/dashboard', function () {
//     return view('admin.dashboard');
// });
