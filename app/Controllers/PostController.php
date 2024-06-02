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
        if(isset($_FILES['image']))
        {
            $arquivo = $_FILES['image'];
            $pasta = 'public/img/';

            if($arquivo['error'])
                die('Falha ao enviar arquivo');

            $nomeDoArquivo = $arquivo['name'];
            $novoNomeDoArquivo= uniqid();
            $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
            $caminho = $pasta . $novoNomeDoArquivo . "." . $extensao;
            move_uploaded_file($arquivo['tmp_name'], $caminho);
        }

        $data = new DateTime();
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

            if($arquivo['error'])
                die('Falha ao enviar arquivo');
        

            $nomeDoArquivo = $arquivo['name'];
            $novoNomeDoArquivo= uniqid();
            $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
            $caminho = $pasta . $novoNomeDoArquivo . "." . $extensao;
            move_uploaded_file($arquivo['tmp_name'], $caminho);
        }else{
            $caminho = $_POST['imgAntiga'];
        }

        $p = new DateTime();
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
    
        App::get('database')->delete('posts', $id);

        header('Location: /listadepost');

    }

}


?>