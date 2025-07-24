<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\frontEnd\frontEndController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\LaguController;
use App\Http\Controllers\Admin\QuoteController;
use App\Http\Controllers\PaymentController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;

/*
|--------------------------------------------------------------------------
| Halaman Publik
|--------------------------------------------------------------------------
*/

// Halaman homepage1 (sebelum login)
Route::get('/', function () {
    return view('frontend.homepage1.index');
})->name('/homepage');


// Route login dan register pakai Fortify (GET View)
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


// Kalau kamu ingin tetap pakai register Fortify bawaan dan override view-nya:
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

/*
|--------------------------------------------------------------------------
| Halaman Setelah Login (Semua Role)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/journal', [frontEndController::class, 'index'])->name('journal');
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Midtrans
    Route::post('/payment/token', [PaymentController::class, 'getSnapToken'])->name('payment.token');

    // Route ini untuk ganti lagu yang sedang diputar
    Route::get('/journal/play/{id}', [frontEndController::class, 'play'])->name('journal.play');
    Route::get('/journal/create', [frontEndController::class, 'create'])->name('journal.create');
    Route::post('/journal/store', [frontEndController::class, 'store'])->name('journal.store');
    Route::get('/journal/edit/{category}/{id}', [frontEndController::class, 'edit'])->name('journal.edit');
    Route::put('/journal/update/{category}/{id}', [frontEndController::class, 'update'])->name('journal.update');
    Route::get('/journal/history', [frontEndController::class, 'history'])->name('journal.history');
});

/*
|--------------------------------------------------------------------------
| Admin Only
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name('admin.dashboard');

    Route::resource('category', CategoryController::class);
    Route::resource('question', QuestionController::class);
    Route::resource('song', LaguController::class);
    Route::resource('quote', QuoteController::class);
});
