<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

Route::post('/internal/clear-cache', [FrontendController::class, 'clearCache']);
