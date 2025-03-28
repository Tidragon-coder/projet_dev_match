<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/register', [UserController::class, 'showRegister'])->name('register');
Route::post('/register', [UserController::class, 'register'])->name('register.submit');
Route::get('/login', [UserController::class, 'showLogin'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.submit');



Route::middleware('auth')->group(function() {
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::post('/logout', [UserController::class, 'webLogout'])->name('logout');
});