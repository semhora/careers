<?php

namespace Core;
use PDO;

class Database
{
    public static function getConexao()
    {
        $conf = include_once __DIR__ . "/../app/database.php";

        try {

            $conn = new PDO("mysql:host={$conf['mysql']['host']};dbname={$conf['mysql']['database']}", $conf['mysql']['user'], $conf['mysql']['password']);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

            return $conn;

        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

}