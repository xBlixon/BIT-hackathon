<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\EventJoiningController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('root');

Route::get('/landing', function () {
    return Inertia::render('Landing');
});

Route::get('/profile', function () {
    return Inertia::render('Profile');
})->middleware(['auth'])->name('profile');

Route::middleware('auth')->group(function () {

    // create event
    Route::get('/events/create', [EventController::class, 'create'])
        ->name('events.create');

    // save event
    Route::post('/events', [EventController::class, 'store'])
        ->name('events.store');

    Route::get('/join/{event}', [EventJoiningController::class, 'join'])
        ->name('events.join');
});

Route::get('home', [HomeController::class, 'home'])
    ->name('home');


/* WHEN THE DATA BASE EXISTS:
//for all guests
// homepage (shows list of events)
Route::get('/', [EventController::class, 'index'])->name('home');

//view event details
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

//only for users
Route::middleware('auth')->group(function () {

    //the main page
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    //create an event
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');

    //save event
    Route::post('/events', [EventController::class, 'store'])->name('events.store');

    //join event
    Route::post('/events/{event}/join', [EventController::class, 'join'])->name('events.join');

    //user profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
*/

require __DIR__.'/auth.php';
