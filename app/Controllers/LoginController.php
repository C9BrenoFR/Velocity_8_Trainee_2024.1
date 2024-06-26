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
            'pfp'=>'/public/img/defaultpfp.png',
            
        ];
        App::get('database')->create('users',$parameters);
        header('Location: /users');
    }

    public function login(){

        $email = $_POST['email'];
        $password = $_POST['password'];

        $logged = App::get('database')->login('users',$email, $password);

        if ($logged){
            session_start();
            $user = App::get('database')->selectOnLogin($email);
            $_SESSION['logado'] = true;
            $_SESSION['user'] = $user[0];
            header('location: /dashboard');
        }
        else{
            $error = ['error' => "Senha ou Email Inválidos"]; 
            return view('site/login', compact('error'));
        }
    }
    public function delete(){

        session_start();
        session_destroy();
        header('location: /login');
    }
}

