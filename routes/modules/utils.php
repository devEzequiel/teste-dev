<?php

use App\Http\Controllers\Api\V1\CategoryController;
use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\Api\V1\UtilsController::class)
    ->name('utils.')
    ->prefix('utils')
    ->group(function () {

        Route::get('/health-check', 'healthCheck')->name('check');

    });
