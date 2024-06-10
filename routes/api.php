<?php

use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\GuestbookController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::post('/register', [UserAuthController::class, 'register']);
Route::post('/login', [UserAuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [UserAuthController::class, 'logout']);
});

Route::get('/skills', [SkillController::class, 'index']);
Route::get('/skills/{type}', [SkillController::class, 'show']);
Route::post('/skills', [SkillController::class, 'store']);
Route::put('/skills/{id}', [SkillController::class, 'update']);
Route::delete('/skills/{id}', [SkillController::class, 'destroy']);

Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{id}', [ProjectController::class, 'show']);
Route::post('/projects', [ProjectController::class, 'store']);
Route::put('/projects/{id}', [ProjectController::class, 'update']);
Route::delete('/projects/{id}', [ProjectController::class, 'destroy']);

Route::get('/guestbooks', [GuestbookController::class, 'index']);
Route::get('/guestbooks/{id}', [GuestbookController::class, 'show']);
Route::post('/guestbooks', [GuestbookController::class, 'store']);
Route::put('/guestbooks/{id}', [GuestbookController::class, 'update']);
Route::delete('/guestbooks/{id}', [GuestbookController::class, 'destroy']);
