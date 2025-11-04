<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompetitionController;
use Illuminate\Support\Facades\Route;

Route::get("/", function() {
    return view('welcome');
})->name("home");

Route::fallback(function() {
    return view('welcome');
})->name("home");

Route::middleware('auth')->post("/logout", [AuthController::class,"logout"])->name("logout");

Route::middleware('guest')->controller(AuthController::class)->group(function () {
    // View routes
    Route::get('/register', 'showRegister')->name('show.register');
    Route::get('/login', 'showLogin')->name('show.login');
    
    // Action routes
    Route::post('/register', 'register')->name('register');
    Route::post('/login', 'login')->name('login');
});

Route::middleware('auth')->controller(CompetitionController::class)->group(function () {
    
    // View routes
    Route::get('/competitions', 'index')->name('competitions.index');
    
    
    // Action routes
    Route::post('/competitions/{competition}', 'create')->name('create');
    Route::delete('/competitions/{competition}', 'delete')->name('delete');
});

