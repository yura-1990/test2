<?php

class Database
{
    private $host = 'localhost';
    private $db = 'test';
    private $port = 5433;
    private $user = 'postgres';
    private $password = 'postgres';
    private $conn;

    public function connect(){
        try {
            $this->conn = new PDO("pgsql:host=$this->host;port=$this->port;dbname=$this->db", $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        }catch (PDOException $exception){
            echo 'error' . $exception->getMessage();
        }
    }
}