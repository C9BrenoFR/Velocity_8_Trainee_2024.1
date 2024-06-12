<?php

namespace App\Controllers;
use App\Controllers\VizController;
use App\Core\Router;

    $router->get('landingPage', 'VizController@index');
    $router->get('listaDePosts', 'VizController@lista');
    $router->get('V8','VizController@exibir');
    
