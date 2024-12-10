<?php

class Connection {
    private $host = 'localhost';
    private $dbname = 'csvdb';
    private $username = 'root';
    private $password = '';

    private $conn;

    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" .$this->host. ";dbname=" .$this->dbname, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } catch (PDOException $e) {
            echo "Connection Failed!" . $e->getMessage();
        }

        return $this->conn;
    }

    public function disconnect() {
        $this->conn = null;
        return $this->conn;
    }
}