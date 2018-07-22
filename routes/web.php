<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', 'WelcomeController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('films', 'FilmsController@index');

Route::get('films/create', 'FilmsController@create');

Route::post('addFilm', 'FilmsController@addfilm');

Route::get('films/{slug}', 'FilmsController@FilmInfo');

Route::post('addComment', 'FilmsController@addComment');


