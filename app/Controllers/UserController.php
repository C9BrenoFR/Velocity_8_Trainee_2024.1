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

        $itensPage = 4;
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

    public function delete(){
        $id=$_POST['delete'];
        unlink($_POST['imagem']);
        App::get('database')->delete('users', $id);

    header('Location: /users');
    }
}