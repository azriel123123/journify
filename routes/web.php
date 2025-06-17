<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\registerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.login');
});

Route::get('/home', [homeController::class, 'index'])->name('home');
Route::get('/register', [registerController::class, 'create'])->name('register');

// aktifin klo pronen udh jadi

// Route::middleware(['auth', 'role:admin'])->get('/dashboard', function () {
//     return view('admin.dashboard');
// });
