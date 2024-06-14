<?php

namespace App\Controllers;
use App\Controllers\ExampleController;
use App\Core\Router;

    $router->get('listadepost', 'PostController@index');
    $router->post('listadepost/create', 'PostController@create');
    $router->post('listadepost/edit', 'PostController@edit');
    $router->post('listadepost/delete', 'PostController@delete');
    $router->get('posts/search', 'SiteController@busca');
    $router->get('posts', 'SiteController@lista');
    $router->get('vdpi', 'SiteController@exibir');
    $router->get('','SiteController@landing');
    $router->get('dashboard', 'SiteController@dashboard');
    $router->get('users', 'UserController@index');
    $router->post('users/create', 'LoginController@create');
    $router->post('users/edit', 'UserController@edit');
    $router->post('users/delete', 'UserController@delete');
    $router->get('login', 'LoginController@index');
    
