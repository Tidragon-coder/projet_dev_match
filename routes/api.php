<?php
 
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\FeedbackController;

 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SwipeController;
use App\Http\Controllers\MessageController;

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

//route projets
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/projets', [ProjetController::class, 'store']); // Ajouter un projet
    Route::post('/swipe', [SwipeController::class, 'store']); // Ajouter un projet
    Route::get('/projets', [ProjetController::class, 'index']);  // Voir tous les projets
    Route::delete('/projets/{projet}', [ProjetController::class, 'destroy']); // Supprimer un projet


    Route::post('/apropos', [FeedbackController::class, 'feedback']); // faire un feedback

    // route mesg
    Route::get('/messages/{match_id}', [MessageController::class, 'index']);
    Route::post('/messages', [MessageController::class, 'store']);

});
