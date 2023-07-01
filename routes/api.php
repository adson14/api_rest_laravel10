<?php

use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::prefix('auth')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('login', 'login');
        Route::post('register', 'register');
    });
});

Route::group(['middleware' => 'apiJWT'], function(){
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::apiResource('expenses', ExpenseController::class);
});


