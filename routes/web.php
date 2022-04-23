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

$router->group(['prefix' => 'api/'], function ($router) {
    $router->get('login/', 'UsersController@authenticate');
    $router->get('devices', 'DevicesController@getAllDevices');
    $router->get('device/{id}', 'DevicesController@getDevice');
    $router->post('device/create', 'DevicesController@createDevice');
    $router->put('device/{id}/update', 'DevicesController@updateDevice');
    $router->delete('device/{id}', 'DevicesController@deleteDevice');
});

$router->get('/users', 'UsersController@getAllUsers');
$router->get('/user/{id}', 'UsersController@getUser');
$router->post('/user/create', 'UsersController@createUser');
$router->put('/user/{id}/update', 'UsersController@updateUser');
$router->delete('/user/{id}', 'UsersController@deleteUser');
