<?php


namespace Core;

use PDO;

abstract class BaseModel
{
    protected $pdo;
    protected $table;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function all()
    {
        $query = "SELECT * FROM {$this->table}";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();

        $stmt->closeCursor();

        return $result;
    }

    public function get($id)
    {
        $query = "SELECT * FROM {$this->table} WHERE id={$id}";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch();

        $stmt->closeCursor();

        return $result;
    }
}