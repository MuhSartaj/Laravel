<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('test','ExampleController@index');

$router->group(['prefix' => 'api'], function () use ($router) {
	$router->get('films',  ['uses' => 'FilmController@List']);
	$router->get('detail/{slug}', ['uses' => 'FilmController@getFilmInfo']);
	$router->post('create', ['uses' => 'FilmController@Add']);
	$router->post('addComment', ['uses' => 'FilmController@addComment']);
	//$router->delete('authors/{id}', ['uses' => 'FilmController@delete']);
	//$router->put('authors/{id}', ['uses' => 'FilmController@update']);
});