<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
});

// Placeholder routes - to be implemented
// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
//     Route::resource('jobs', JobController::class);
//     Route::resource('candidates', CandidateController::class);
//     Route::resource('applications', ApplicationController::class);
// });
