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
}