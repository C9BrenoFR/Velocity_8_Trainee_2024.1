<?php

namespace App\Controllers;

use App\Core\App;
use DateTime;
use Exception;

class SiteController
{
    public function lista(){
        $posts = App::get('database')->selectAll('posts');
        return view('site/listaDePosts', compact('posts'));
    }
    public function busca(){
        $posts = App::get('database')->search('posts', $_GET['busca']);

        return view('site/listaDePosts', compact('posts'));
        
    }
}