<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:student'])->group(function () {
    // student routes
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    // admin routes
});


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
