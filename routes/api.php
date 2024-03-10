<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\vueTaskController;

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


Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'vueTask'], function () {
    Route::resource('/', vueTaskController::class);
    Route::get('/{id}', 'VueTaskController@show');
    Route::put('/{id}', 'VueTaskController@update');
    Route::delete('/{id}', 'VueTaskController@destroy');
});