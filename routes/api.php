<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('films', 'FilmsController@index');
Route::get('films/{id}', 'FilmsController@show');
Route::post('films', 'FilmsController@store');
Route::put('films/{id}', 'FilmsController@update');
Route::delete('films/{id}', 'FilmsController@delete');