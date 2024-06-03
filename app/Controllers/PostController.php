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
}