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
            Route::get('register', [UserController::class, 'register'])->name('user.registration');
        });
    }
);

Route::get('hello', function () {
    return "dafa";
});
