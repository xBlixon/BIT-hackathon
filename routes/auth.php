<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {

    // the registration page
    Route::get('register', [LoginController::class, 'create'])
        ->name('register');

    // save user data to data base
    Route::post('register', [LoginController::class, 'store']);

    // the login page
    Route::get('login', [LoginController::class, 'login'])
        ->name('login');

    // login submission (check passowrd and start session)
    Route::post('login', [LoginController::class, 'authenticate']);

});

Route::middleware('auth')->group(function () {
    // logout and ridirect to home page
    Route::post('logout', [LoginController::class, 'destroy'])
        ->name('logout');
});
