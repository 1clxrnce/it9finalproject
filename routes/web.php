<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComputerPartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\ComputerPart;

// Public Welcome Page
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Protected Routes - Require Authentication
Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        $totalParts = ComputerPart::count();
        $totalQuantity = ComputerPart::sum('quantity');
        $totalValue = ComputerPart::sum(\DB::raw('price * quantity'));
        
        return view('home', compact('totalParts', 'totalQuantity', 'totalValue'));
    })->name('home');

    // Computer Parts Routes - Both Admin and Inventory Staff can access
    Route::resource('computer-parts', ComputerPartController::class);
    
    // User Management Routes - Admin Only
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('users', UserController::class);
    });
});
