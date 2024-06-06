<?php

namespace App\Controllers;
use App\Controllers\ExampleController;
use App\Core\Router;

    $router->get('users', 'UserController@index');
    $router->post('users/edit', 'UserController@edit');
