<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class PostController
{

    public function index()
    {
        $posts = App::get('database')->selectAll('posts');
        return view('admin/listadepost', compact('posts'));

    }

    public function create()
    {
        $parameters = [
            'title'=>$_POST['title'],
            'description'=>$_POST['description'],
            'data'=>$_POST['data'],
            'image'=>$_POST['image']
        ];

        App::get('database')->create('posts', $parameters);

        header('Location: /listadepost');
    }
}

?>