<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/projects', [FrontendController::class, 'projects'])->name('projects.list');
Route::get('/project/{id}', [FrontendController::class, 'projectDetails'])->name('project.details');
Route::get('/clients', [FrontendController::class, 'clients'])->name('clients.list');
Route::get('/portfolio', [FrontendController::class, 'portfolio'])->name('portfolio');
Route::get('/team', [FrontendController::class, 'team'])->name('team.list');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('/contact', [FrontendController::class, 'sendContactMessage'])->name('contact.submit')->middleware('throttle:5,1');
Route::get('/circular', [FrontendController::class, 'circulars'])->name('circular.list');
Route::get('/circular/{slug}', [FrontendController::class, 'circularDetails'])->name('circular.details');
Route::post('/circular/{slug}/apply', [FrontendController::class, 'applyForJob'])->name('circular.apply');
