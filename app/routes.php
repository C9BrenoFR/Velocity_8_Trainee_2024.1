<?php

namespace App\Controllers;
use App\Controllers\ExampleController;
use App\Core\Router;

    $router->get('listadepost', 'PostController@index');
    $router->post('listadepost/create', 'PostController@create');
    $router->post('listadepost/edit', 'PostController@edit');
?>