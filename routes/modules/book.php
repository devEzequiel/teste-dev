<?php

use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\Api\V1\BookController::class)
    ->name('books.')
    ->prefix('books')
    ->group(function () {
        Route::get('/', 'all')->name('list');
        Route::get('/{id}', 'show')->name('detail');
        Route::post('/', 'store')->name('create');
        Route::put('/', 'update')->name('edit');
        Route::delete('/{id}', 'destroy')->name('delete');
    });
