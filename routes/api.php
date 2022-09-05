<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//routes endpoints
Route::prefix('v1')->group(function () {
    require_once ('modules/book.php');
    require_once ('modules/category.php');
    require_once ('modules/utils.php');
});
