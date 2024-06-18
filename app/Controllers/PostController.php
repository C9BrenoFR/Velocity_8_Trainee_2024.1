<?php

namespace App\Controllers;

use App\Core\App;
use DateTime;
use Exception;

class PostController
{

    public function index()
    {
        $page = 1;
        if(isset($_GET['paginacaoNumero']) && !empty($_GET['paginacaoNumero'])) {
            $page = intval($_GET['paginacaoNumero']);

            if($page <= 0){
                return redirect('/listadepost');
            }
        }

        $itensPage = 6;
        $inicio = $itensPage * $page - $itensPage;
        $rows_count = App::get('database')->countAll('posts');

        if($inicio > $rows_count){
            return redirect('/listadepost');
        }
        
        $posts = App::get('database')->selectAll('posts', $inicio, $itensPage);
        $users = App::get('database')->selectAll('users');

        $total_pages = ceil($rows_count/$itensPage);

        return view('admin/listadepost', compact('posts','users', 'page', 'total_pages'));
    }

    public function create()
    {
        if(isset($_FILES['image']))
        {
            $arquivo = $_FILES['image'];
            $pasta = 'public/img/';
            $pasta2 = '../../';

            if($arquivo['error'])
                die('Falha ao enviar arquivo');

            $nomeDoArquivo = $arquivo['name'];
            $novoNomeDoArquivo= uniqid();
            $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
            $caminho = $pasta . $novoNomeDoArquivo . "." . $extensao;
            move_uploaded_file($arquivo['tmp_name'], $caminho);
            $caminho = $pasta2 . $caminho;
        }

        
        $parameters = [
            'title'=>$_POST['title'],
            'description'=>$_POST['description'],
            'data'=>$_POST['data'],
            'image'=> $caminho,
            'idUser'=>$_POST['autor']
        ];


        App::get('database')->create('posts', $parameters);

        header('Location: /listadepost');
    }

    public function edit()
    {
        if(!empty($_FILES['image']['tmp_name']))
        {
            unlink($_POST['imgAntiga']);
            $arquivo = $_FILES['image'];
            $pasta = 'public/img/';
            $pasta2 = '../../';

            if($arquivo['error'])
                die('Falha ao enviar arquivo');
        

            $nomeDoArquivo = $arquivo['name'];
            $novoNomeDoArquivo= uniqid();
            $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
            $caminho = $pasta . $novoNomeDoArquivo . "." . $extensao;
            move_uploaded_file($arquivo['tmp_name'], $caminho);
            $caminho = $pasta2 . $caminho;
        }else{
            $caminho = $_POST['imgAntiga'];
        }

        
        $parameters = [
            'title'=>$_POST['title'],
            'description'=>$_POST['description'],
            'data'=>$_POST['data'],
            'image'=>$caminho,
            'idUser'=>$_POST['autor']
        ];

        $id = $_POST['id'];
        App::get('database')->edit('posts', $id, $parameters);

        header('Location: /listadepost');
    }

    public function delete(){

        $id = $_POST['id'];

        unlink($_POST['imgAntiga']);
    
        App::get('database')->delete('posts', $id);

        header('Location: /listadepost');

    }
    

}


?>