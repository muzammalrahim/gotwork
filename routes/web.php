<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\QualificationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ProjectController;

use Spatie\Activitylog\Models\Activity;

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

Route::get('/activities', function () {
    return Activity::orderBy('id','DESC')->get();
})->name('activities');

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

// Experience Tab Routes
Route::post('/personal-experience-store', [ExperienceController::class, 'storePersonalExperience'])->name('personal-experience.store');

Route::post('/personal-experience-update', [ExperienceController::class, 'updatePersonalExperience'])->name('personal-experience.update');

Route::get('/personal-experience-remove/{id}', [ExperienceController::class, 'deletePersonalExperience'])->name('personal-experience.remove');

// Qualification Tab Routes
Route::post('/personal-qualification-store', [QualificationController::class, 'storePersonalQualification'])->name('personal-qualification.store');

Route::post('/personal-qualification-update', [QualificationController::class, 'updatePersonalQualification'])->name('personal-qualification.update');

Route::get('/personal-qualification-remove/{id}', [QualificationController::class, 'deletePersonalQualification'])->name('personal-qualification.remove');

/* End: Settings Page Routes */

Route::get('/ajax/universities/{id}', [ProfileController::class, 'universities'])->middleware(['auth'])->name('universities');


/* Start: Dashboard Page Routes */

// Dashboard Page Routes


Route::any('/dashboard', [DashboardController::class, 'goToDashboard'])->middleware(['auth'])->name('dashboard');

Route::any('/projects', [DashboardController::class, 'projects'])->middleware(['auth'])->name('projects');

Route::any('/my-projects', [ProjectController::class, 'myProjects'])->middleware(['auth'])->name('myProjects');

Route::any('/client-projects', [ProjectController::class, 'clientProjects'])->middleware(['auth'])->name('client.projects');

Route::get('/projects/{slug}/details', [ProjectController::class, 'projectDetails'])->middleware(['auth'])->name('projectDetail');

// Porposals
Route::get('/projects/{slug}/proposals', [ProjectController::class, 'getProjectProposals'])->middleware(['auth'])->name('proposals');

Route::any('/projects/place-bid', [ProjectController::class, 'place_bid'])->middleware(['auth'])->name('place_bid');



/*
Route::post('/dashboard/search', [ProjectController::class, 'filterProjects'])->middleware(['auth'])->name('projects.filters');
*/

/* End: Dashboard Page Routes */