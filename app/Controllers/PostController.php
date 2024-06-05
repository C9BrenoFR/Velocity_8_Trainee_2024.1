<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class PostController
{

    public function index()
    {
        $users = App::get('database')->selectAll('users');
        return view('admin/ListaUsuarios', compact('users'));
    }

    public function edit(){
        $parameters = [
            'name' => $_POST['nome'],
            'email' => $_POST['email'],
            'password' => $_POST['senha'],
            'pfp' => $_POST['img']
        ];

        $id = $_POST['id'];

        App::get('database')->update('users', $id, $parameters);
        
        header('Location: /users');
    }
}