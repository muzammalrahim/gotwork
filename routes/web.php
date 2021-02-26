<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

// Login With Google
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
// End Login With Google

require __DIR__.'/auth.php';

Route::get('/dashboard', [DashboardController::class, 'goToDashboard'])->middleware(['auth'])->name('dashboard');

Route::get('/profile', [ProfileController::class, 'goToProfile'])->middleware(['auth'])->name('profile');


