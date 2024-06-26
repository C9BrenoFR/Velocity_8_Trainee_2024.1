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

            if($arquivo['error'])
                die('Falha ao enviar arquivo');

            $nomeDoArquivo = $arquivo['name'];
            $novoNomeDoArquivo= uniqid();
            $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
            $caminho = $pasta . $novoNomeDoArquivo . "." . $extensao;
            move_uploaded_file($arquivo['tmp_name'], $caminho);
            
        }

        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }

        if($_SESSION['user']->isAdmin){
            $idUser = $_POST['autor'];
        }else{
            $idUser = $_SESSION['user']->id;
        }
        
        $parameters = [
            'title'=>$_POST['title'],
            'description'=>$_POST['description'],
            'data'=>$_POST['data'],
            'image'=> $caminho,
            'idUser'=>$idUser,
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

        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
        
        if($_SESSION['user']->isAdmin){
            $idUser = $_POST['autor'];
        }else{
            $idUser = $_SESSION['user']->id;
        }
        
        $parameters = [
            'title'=>$_POST['title'],
            'description'=>$_POST['description'],
            'data'=>$_POST['data'],
            'image'=> $caminho,
            'idUser'=>$idUser,
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