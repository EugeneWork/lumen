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

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->group(['prefix' => 'user'], function () use ($router) {
        $router->post('register', ['uses' => 'AuthController@store']);
        $router->post('sign-in', ['uses' => 'AuthController@login']);
        $router->post('recover-password', ['uses' => 'AuthController@passwordRecover']);
        $router->post('reset-password', ['uses' => 'AuthController@resetPassword']);
        $router->post('logout', ['middleware' => 'auth','uses' => 'AuthController@logout']);
        $router->get('companies', ['middleware' => 'auth', 'uses' => 'CompanyController@index']);
        $router->post('companies', ['middleware' => 'auth', 'uses' => 'CompanyController@store']);
    });
});
