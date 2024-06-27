<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class UserController
{
    public function index()
    {
        $page = 1;
        if(isset($_GET['paginacaoNumero']) && !empty($_GET['paginacaoNumero'])) {
            $page = intval($_GET['paginacaoNumero']);

            if($page <= 0){
                return redirect('/users');
            }
        }

        $itensPage = 6;
        $inicio = $itensPage * $page - $itensPage;
        $rows_count = App::get('database')->countAll('users');

        if($inicio > $rows_count){
            return redirect('/users');
        }

        $users = App::get('database')->selectAll('users', $inicio, $itensPage);

        $total_pages = ceil($rows_count/$itensPage);
        
        return view('admin/ListaUsuarios', compact('users', 'page', 'total_pages'));
    }

    public function edit(){

        if(!empty($_FILES['img']['tmp_name'])){
            if($_POST['imgAntiga'] != "public/img/defaultpfp.png")
            {
                unlink($_POST['imgAntiga']);
            }
            $arquivo = $_FILES['img'];
            $pasta = 'public/img/';

            if($arquivo['error'])
                die('Falha ao enviar arquivo');
        

            $nomeDoArquivo = $arquivo['name'];
            $novoNomeDoArquivo= uniqid();
            $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
            $caminho = $pasta . $novoNomeDoArquivo . "." . $extensao;
            move_uploaded_file($arquivo['tmp_name'], $caminho);
        } else{
            $caminho = $_POST['imgAntiga'];
        }

        $id = $_POST['id'];

        $parameters = [
            'email' => $_POST['email'],
            'name' => $_POST['nome'],
            'password' => $_POST['senha'],
            'pfp' => $caminho,
        ];

        App::get('database')->edit('users', $id, $parameters);
        
        header('Location: /users');
    }



    public function delete(){
        $id=$_POST['delete'];
        $user=App::get('database')->select('users', $id);
        
        if($user[0]->pfp != "public/img/defaultpfp.png"){
            unlink($_POST['imagem']); 
        }
        $posts = App::get('database')->selectAll('posts');
        foreach($posts as $post){
            if($post->idUser == $id){
                unlink($post->image);
                App::get('database')->delete('posts', $post->id);
            }

        }
        App::get('database')->delete('users', $id);

    header('Location: /users');
    }



}