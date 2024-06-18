<?php

namespace App\Controllers;

use App\Core\App;
use DateTime;
use Exception;

class SiteController
{
    public function lista(){
        $page = 1;
        if(isset($_GET['paginacaoNumero']) && !empty($_GET['paginacaoNumero'])) {
            $page = intval($_GET['paginacaoNumero']);

            if($page <= 0){
                return redirect('/posts');
            }
        }

        $itensPage = 6;
        $inicio = $itensPage * $page - $itensPage;
        $rows_count = App::get('database')->countAll('posts');

        if($inicio > $rows_count){
            return redirect('/posts');
        }

        $posts = App::get('database')->selectAll('posts', $inicio, $itensPage);
        $users = App::get('database')->selectAll('users');

        $total_pages = ceil($rows_count/$itensPage);

        return view('site/listaDePosts', compact('posts', 'users', 'page', 'total_pages'));
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

    public function dashboard()
    {
        return view('admin/dashboard');
    }
}