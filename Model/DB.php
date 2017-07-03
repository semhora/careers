<?php

class DB {

    private $conn;

    public function __construct() {
        $this->conn = new mysqli('localhost', 'root', '', 'semhora');
    }

    protected function execReader($sql) {
        return $this->conn->query($sql);
    }

    protected function execSQL($sql) {
        return $this->conn->query($sql);
    }
    
    public function __destruct() {
        $this->conn->close();
    }
}

?>