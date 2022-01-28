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

$router->group(['prefix' => 'users'], function () use ($router) {
    
    //Lists all registered users in the database
    $router->get('/list', ['uses'=>'UserController@listUsers']);

    //Find user by id
    $router->get('/find/{id}', ['uses'=>'UserController@findUser']);

    //Insert new user
    $router->post('/insert/', ['uses'=>'UserController@insertUser']);

    //Update user
    $router->put('/update/', ['uses'=>'UserController@updateUser']);

    //Delete user
    $router->delete('/delete/{id}', ['uses'=>'UserController@deleteUser']);

});
