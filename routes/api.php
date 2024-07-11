<?php

use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\EventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/events', [EventController::class, 'get']);
    Route::get('/events/search', [EventController::class, 'search']);

    Route::post('/logout', [AuthController::class, 'logout']);
});
