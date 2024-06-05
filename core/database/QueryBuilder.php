<?php

namespace App\Core\Database;

use PDO, Exception;

class QueryBuilder
{
    protected $pdo;


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {
        $sql = "select * from {$table}";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function update($table, $id, $parameters){

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
            $pasta = "./public/img/";

            //gerando nome pro arquivo (para nao sobrescrever)
            $nomeDoArquivo = $arquivo["name"];
            $novoNomeArquivo = uniqid();
            $extensao = strtolower();

        }
        
        $sql = sprintf('UPDATE  %s SET $s WHERE id=%s', 
            $table,
            implode(', ', array_map(function($param){
                return "{$param} = :{$param}";
            }, array_keys($parameters))),
            $id
        );

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);

        } catch (Exception $e) {
            die($e->getMessage());
        }

    }
}