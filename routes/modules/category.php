<?php

use App\Http\Controllers\Api\V1\CategoryController;
use Illuminate\Support\Facades\Route;

Route::controller(CategoryController::class)
    ->name('categories.')
    ->prefix('categories')
    ->group(function () {

        Route::get('/', 'list')->name('list');
        Route::post('/', 'store')->name('create');
        Route::delete('/{id}', 'destroy')->name('delete');

    });
