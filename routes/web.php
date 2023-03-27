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
        $router->post('register', ['uses' => 'AuthorController@create']);
        $router->post('sign-in', ['uses' => 'AuthorController@create']);
        $router->post('recover-password', ['uses' => 'AuthorController@create']);
        $router->get('companies',  ['uses' => 'AuthorController@showAllAuthors']);
        $router->post('companies', ['uses' => 'AuthorController@create']);
    });
});
