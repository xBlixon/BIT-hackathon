<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function() {

    //the registration page
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    //save user data to data base
    Route::post('register', [RegisteredUserController::class, 'store']);
    
    //the login page
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');
    
    //login submission (check passowrd and start session)
    Route::post('login', [AuthenticatedSessionController::class, 'store']);    

});


Route::middleware('auth')->group(function(){
    //logout and ridirect to home page
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});