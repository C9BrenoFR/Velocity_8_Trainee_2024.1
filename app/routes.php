<?php

namespace App\Controllers;
use App\Controllers\ExampleController;
use App\Core\Router;

    $router->get('users', 'UserController@index');
    $router->post('users/create', 'LoginController@create');
    $router->post('users/edit', 'UserController@edit');
    $router->post('users/delete', 'UserController@delete');
    $router->get('login', 'LoginController@index');
    