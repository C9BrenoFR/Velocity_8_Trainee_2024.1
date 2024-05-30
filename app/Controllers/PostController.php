<?php

namespace App\Controllers;

use App\Core\App;
use DateTime;
use Exception;

class PostController
{

    public function index()
    {
        $posts = App::get('database')->selectAll('posts');
        $users = App::get('database')->selectAll('users');

        return view('admin/listadepost', compact('posts','users'));

    }

    public function create()
    {
        $data = new DateTime();
        $parameters = [
            'title'=>$_POST['title'],
            'description'=>$_POST['description'],
            'data'=>$_POST['data'],
            'image'=>$_POST['image'],
            'idUser'=>$_POST['autor']
        ];


        App::get('database')->create('posts', $parameters);

        header('Location: /listadepost');
    }

    public function edit()
    {
        $p = new DateTime();
        $parameters = [
            'title'=>$_POST['title'],
            'description'=>$_POST['description'],
            'data'=>$_POST['data'],
            'image'=>$_POST['image'],
            'idUser'=>$_POST['autor']
        ];

        $id = $_POST['id'];
        App::get('database')->edit('posts', $parameters);

        header('Location: /listadepost');
    }

}


?>