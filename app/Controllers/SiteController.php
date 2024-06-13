<?php

namespace App\Controllers;

use App\Core\App;
use DateTime;
use Exception;

class SiteController
{
    public function lista(){
        $posts = App::get('database')->selectAll('posts');
        $users = App::get('database')->selectAll('users');

        return view('site/listaDePosts', compact('posts', 'users'));
    }
    public function busca(){
        $posts = App::get('database')->search('posts', $_GET['busca']);
        $users = App::get('database')->selectAll('users');

        return view('site/listaDePosts', compact('posts', 'users'));
        
    }

    public function exibir()
    {
        $id = $_GET['id'];
        $post = App::get('database')->select('posts', $id);
        $user = App::get('database')->select('users', $post[0]->idUser);

        return view('site/vdpi', compact('post', 'user'));
    }

    public function landing()
    {
        $posts = App::get('database')->recente('posts');
        $users = App::get('database')->selectAll('users');

        return view('site/landingPage', compact('posts','users'));
    }
}