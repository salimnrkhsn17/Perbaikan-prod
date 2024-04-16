<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/stuffs', 'StuffController@index');

$router->post('/login', 'UserController@login');
$router->get('/logout', 'UserController@logout');


$router->group(['prefix' => 'stuffs', 'middleware' => 'auth'], function() use ($router) {
    $router->get('/data', 'StuffController@index');
    $router->post('/', 'StuffController@store');
    $router->get('/trash', 'StuffController@trash');

    $router->get('{id}', 'StuffController@show');
    $router->patch('/{id}', 'StuffController@update');
    $router->delete('/{id}', 'StuffController@destroy');
    $router->get('/restore/{id}', 'StuffController@restore');
    $router->delete('/permanent/{id}', 'StuffController@deletePermanent');
});

$router->group(['prefix'=> '/users'], function() use ($router) {
    $router->get('/data', 'UserController@index');
    $router->post('/', 'UserController@store');
    $router->get('/trash', 'UserController@trash');

    $router->get('{id}', 'UserController@show');
    $router->patch('/{id}', 'UserController@update');
    $router->delete('/{id}', 'UserController@destroy');
    $router->get('/trash', 'UserController@trash');
    $router->get('/restore/{id}', 'UserController@restore');
    $router->delete('/permanent/{id}', 'UserController@deletePermanent');

});

$router->group(['prefix'=> '/StuffStock', 'middleware' => 'auth'], function() use ($router) {
    $router->get('/data', 'UserController@index');
    $router->post('/', 'UserController@store');
    $router->get('/trash', 'UserController@trash');

    $router->get('{id}', 'UserController@show');
    $router->patch('/{id}', 'UserController@update');
    $router->delete('/{id}', 'UserController@destroy');
    $router->get('/trash', 'UserController@trash');
    $router->get('/restore/{id}', 'UserController@restore');
    $router->delete('/permanent/{id}', 'UserController@deletePermanent');
    $router->post('add-stock/{id}', 'StuffStockController@addStock');
});

$router->group(['prefix' => 'inbound-stuff', ], function() use ($router){
    $router->get('/data', 'InboundStuffController@index');
    $router->post('store', 'InboundStuffController@store');
    $router->get('/trash', 'InboundStuffController@trash');

    $router->get('detail/{id}', 'InboundStuffController@show');
    $router->patch('update/{id}', 'InboundStuffController@update');
    $router->delete('delete/{id}', 'InboundStuffController@destroy');
    $router->get('restore/{id}', 'InboundStuffController@restore');
    $router->delete('/permanent/{id}', 'InboundStuffController@deletePermanent');
    
});

