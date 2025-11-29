<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware('guest')->group(function () {

    // the registration page
    Route::get('register', function () {
        return Inertia::render('auth/Register');
    })->name('register');

    // save user data to data base
    Route::post('register', [LoginController::class, 'register']);

    // the login page
    Route::get('login', [LoginController::class, 'login'])
        ->name('login');

    // login submission (check passowrd and start session)
    Route::post('login', [LoginController::class, 'authenticate']);

});

Route::middleware('auth')->group(function () {
    // logout and ridirect to home page
    Route::match(['get', 'post'], 'logout', [LoginController::class, 'logout'])
        ->name('logout');
});


