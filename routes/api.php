<?php

use Illuminate\Support\Facades\Route;
use Analyzen\Auth\Http\Controllers\UserController;

Route::group(
    [
        'middleware' => 'api',
        'prefix' => 'auth',
    ],
    function () {
        Route::group(['middleware' => 'guest:api'], function () {
            Route::post('register', [UserController::class, 'register'])->name('user.registration');
        });

        Route::group(['middleware' => 'auth:api'], function () {
            Route::any('logout', [UserController::class, 'logout'])->name('user.logout');
        });
    }
);
