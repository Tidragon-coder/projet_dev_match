<?php
 
use App\Http\Controllers\UserController;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SwipeController;
 
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
 
// Route::get('/users', [UserController::class, 'index']);
Route::post('/users/register', [UserController::class, 'register'])->name('api.register');
Route::post('/users/login', [UserController::class, 'login'])->name('api.login');
Route::get('/users/profile', [UserController::class, 'profile'])->middleware('auth:sanctum')->name('api.profile');
Route::post('/users/logout', [UserController::class, 'logout'])->middleware('auth:sanctum');
Route::put('/users/{id}', [UserController::class, 'update']);
Route::middleware('auth:sanctum')->post('/swipe', [SwipeController::class, 'store']);