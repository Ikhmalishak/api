<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum','verified')->group( function () {
    Route::apiResource('blog',BlogController::class);
    Route::post('updateUsername',[UserController::class,'updateUsername'])->name('api.updateUsername');
});

Route::post('register',[AuthController::class,'register'])->name('api.register');

Route::post('login',[AuthController::class,'login'])->name('api.login');


