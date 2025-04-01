<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\SwipeController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/register', [UserController::class, 'showRegister'])->name('register');
Route::post('/register', [UserController::class, 'register'])->name('register.submit');
Route::get('/login', [UserController::class, 'showLogin'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.submit');

//systeme de swipe
Route::post('/swipe', [SwipeController::class, 'store'])->name('swipe.store');
Route::get('/next-profile', [SwipeController::class, 'showNextProfile'])->name('next.profile');


Route::middleware('auth')->group(function() {
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::post('/logout', [UserController::class, 'webLogout'])->name('logout');
    Route::get('/profile/edit', [UserController::class, 'showedit'])->name('edit'); // Affichage du formulaire
    Route::post('/profile/edit', [UserController::class, 'update'])->name('update');
    //Route::get('/match', [UserController::class, 'showmatch'])->name('match');
    Route::get('/match', [UserController::class, 'randomProfile'])->name('match');

    Route::get('/profile', [ProjetController::class, 'indexView'])->name('profile');
    Route::post('/projets', [ProjetController::class, 'store'])->name('projets.store');
    Route::delete('/projets/{id}', [ProjetController::class, 'destroy'])->name('projets.destroy');

});