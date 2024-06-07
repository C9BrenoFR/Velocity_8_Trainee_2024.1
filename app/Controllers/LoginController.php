<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class LoginController
{

    public function index()
    {
        return view('site/login');
    }

    public function create()
    {
        $parameters=[
            'email'=> $_POST['email'],
            'name'=> $_POST['nome'],
            'password'=> $_POST['senha'],
            'pfp'=>'public/img/defaultpfp.png',
            
        ];
        App::get('database')->create('users',$parameters);
        header('Location: /users');
    }
}

