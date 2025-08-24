<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\RegisterController;

// Group of routes for unauthenticated users (guests)
Route::middleware('guest')->group(function () {

  // Route to handle login form submission
  // Uses store method from AuthenticatedSessionController
  Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login');

  if (Config('settings.isRegisterExist')) {
    // Route to display register form
    Route::get('register', [RegisterController::class, 'create'])->name('register');

    // Route to handle register form submission
    Route::post('register', [RegisterController::class, 'register']);
  }
});

// Group of routes for authenticated users
Route::middleware('auth')->group(function () {
  // Route to handle user logout
  // Accepts both GET and POST methods
  // Uses destroy method from AuthenticatedSessionController
  Route::match(['get', 'post'], 'logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');
});
