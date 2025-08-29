<?php

use Illuminate\Support\Facades\Route;
use RafaelMiano\AuthKit\Http\Controllers\LogoutController;
use RafaelMiano\AuthKit\Livewire\Auth\ForgotPassword;
use RafaelMiano\AuthKit\Livewire\Auth\Login;
use RafaelMiano\AuthKit\Livewire\Auth\Profile;
use RafaelMiano\AuthKit\Livewire\Auth\Register;
use RafaelMiano\AuthKit\Livewire\Dashboard\Index as Dashboard;

Route::middleware('web')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', Login::class)->name('login');
        Route::get('/register', Register::class)->name('register');
        Route::get('/forgot-password', ForgotPassword::class)->name('password.request');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', Dashboard::class)->name('dashboard');
        Route::get('/profile', Profile::class)->name('profile');
        Route::post('/logout', LogoutController::class)->name('logout');
    });
});


