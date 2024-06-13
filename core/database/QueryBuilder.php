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

    public function create($table, $parameters)
    {
        $sql = sprintf('INSERT INTO %s (%s) VALUE (%s)',
        $table,
        implode (', ', array_keys($parameters)),
        ':' . implode(  ', :', array_keys($parameters))
        );

            try {
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute($parameters);
    
                return $stmt->fetchAll(PDO::FETCH_CLASS);
    
            } catch (Exception $e) {
                die($e->getMessage());
            }
    }


    public function edit($table, $id, $parameters)
    {
        $sql = sprintf('UPDATE %s SET %s WHERE id = %s',
        $table,
        implode (', ', array_map(function($param){
            return $param . ' = :' . $param;
        }, array_keys($parameters))),
        $id
        );

            try {
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute($parameters);
    
                return $stmt->fetchAll(PDO::FETCH_CLASS);
    
            } catch (Exception $e) {
                die($e->getMessage());
            }
    }

public function delete($table, $id){

    $sql = sprintf('DELETE FROM %s WHERE %s;',
    $table,
    "id = :id");

    try {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(compact('id'));

        
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

public function search($table, $dados){
    $sql = "SELECT * FROM posts WHERE title LIKE '%$dados%'";

    try {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
        
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

public function select($table,$id)
{
    $sql = "Select * FROM {$table} WHERE id = {$id}";

    try {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
        
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

public function recente($table)
{
    $sql = "Select * FROM {$table} ORDER BY data DESC LIMIT 5";

    try {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
        
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

}




