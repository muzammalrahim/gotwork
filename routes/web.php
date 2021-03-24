<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\QualificationController;

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
})->name('home');

// Login With Google
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
// End Login With Google

require __DIR__.'/auth.php';

Route::get('/dashboard', [DashboardController::class, 'goToDashboard'])->middleware(['auth'])->name('dashboard');

Route::get('/profile', [ProfileController::class, 'goToProfile'])->middleware(['auth'])->name('profile');

/* Start: Settings Page Routes */
Route::get('/setting', [ProfileController::class, 'goToSetting'])->middleware(['auth'])->name('setting');

Route::post('/personal-info-update', [ProfileController::class, 'updatePersonalInfo'])->name('personal-info.update');

Route::post('/personal-skills-update', [ProfileController::class, 'updatePersonalSkills'])->name('personal-skills.update');

Route::get('/personal-skills-remove/{id}', [ProfileController::class, 'deletePersonalSkills'])->name('personal-skills.remove');

// Education Tab Routes
Route::post('/personal-education-store', [EducationController::class, 'storePersonalEducation'])->name('personal-education.store');

Route::post('/personal-education-update', [EducationController::class, 'updatePersonalEducation'])->name('personal-education.update');

Route::get('/personal-education-remove/{id}', [EducationController::class, 'deletePersonalEducation'])->name('personal-education.remove');

// Qualification Tab Routes
Route::post('/personal-qualification-store', [QualificationController::class, 'storePersonalQualification'])->name('personal-qualification.store');

Route::post('/personal-qualification-update', [QualificationController::class, 'updatePersonalQualification'])->name('personal-qualification.update');

Route::get('/personal-qualification-remove/{id}', [QualificationController::class, 'deletePersonalQualification'])->name('personal-qualification.remove');

/* End: Settings Page Routes */

Route::get('/ajax/universities/{id}', [ProfileController::class, 'universities'])->middleware(['auth'])->name('universities');
