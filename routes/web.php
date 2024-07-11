<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\UserController as VerificationController;
use Illuminate\Support\Facades\Route;

Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verifyEmail'])->name('verification.verify');

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['prefix' => 'event', 'as' => 'event.'], function () {
    Route::get('/list/{status}', [EventController::class, 'list'])->name('list');
    Route::get('/location/{event:id}', [EventController::class, 'location'])->name('show-location');
    Route::get('/create', [EventController::class, 'create'])->name('create');
    Route::post('/store', [EventController::class, 'store'])->name('store');
    Route::get('/list/{status}/edit/{event:id}', [EventController::class, 'edit'])->name('edit');
    Route::patch('/update/{event:id}', [EventController::class, 'update'])->name('update');
    Route::delete('/list/{status}/destroy/{event:id}', [EventController::class, 'destroy'])->name('destroy');
});

Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::delete('/delete/{user:id}', [UserController::class, 'destroy'])->name('destroy');
});
