<?php

use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\EventController;
use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/resend-email-verification', [UserController::class, 'resendEmailVerification']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/user', [UserController::class, 'get']);

    Route::get('/events', [EventController::class, 'get']);
    Route::get('/events/search', [EventController::class, 'search']);

    Route::post('/logout', [AuthController::class, 'logout']);
});
