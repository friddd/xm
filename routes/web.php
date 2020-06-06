<?php

use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;

Route::post('/', [CompanyController::class, 'postHistory']);
Route::get('/', [CompanyController::class, 'getHistory']);
