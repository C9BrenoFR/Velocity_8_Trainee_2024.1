<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class VizController
{

    public function index()
    {
        $users = App::get('database')->selectAll('users');
        $posts = App::get('database')->selectAll('posts');

        return view('site/landingPage', compact('users','posts'));
    }

    public function lista()
    {
        $users = App::get('database')->selectAll('users');
        $posts = App::get('database')->selectAll('posts');

        return view('site/listaDePosts', compact('users','posts'));
    }

    public function exibir()
    {
        $users = App::get('database')->selectAll('users');
        $posts = App::get('database')->selectAll('posts');

        return view('site/vdpi', compact('users','posts'));
    }

}

