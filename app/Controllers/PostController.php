<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class PostController
{
    public function index()
    {
        $users = App::get('database')->selectAll('users');
        return view('admin/ListaUsuarios', compact('users'));
    }

    public function edit(){

        if(isset($_FILES['img'])){
            $arquivo = $_FILES['img'];  
            //verificando se há erro
            if($arquivo['error']){
                die('Falha ao enviar arquivo.');
            }
            //definindo tamanho
            if($arquivo['size'] > 2097152){
                die('Arquivo muito grande. Max: 2MB.');
            }
            //definindo pasta de destino
            $pasta = "public/img/";
            //gerando nome pro arquivo (para nao sobrescrever)
            $nomeDoArquivo = $arquivo['name'];
            $novoNomeArquivo = uniqid();
            $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
            $caminho = $pasta . $novoNomeArquivo . "." . $extensao;
            move_uploaded_file($arquivo["tmp_name"], $caminho);
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
}