<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;


Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/projects', [FrontendController::class, 'projects'])->name('projects.list');
Route::get('/project/{id}', [FrontendController::class, 'projectDetails'])->name('project.details');
Route::get('/clients', [FrontendController::class, 'clients'])->name('clients.list');
Route::get('/portfolio', [FrontendController::class, 'portfolio'])->name('portfolio');
Route::get('/team', [FrontendController::class, 'team'])->name('team.list');


Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');
