<?php

class Catalog
{
    private $conn;
    private $table = 'catalogs';

    public function __construct($db)
    {
        $this->conn=$db;
    }

    public function getALL()
    {
        $query = "SELECT * FROM $this->table";
        $smtp = $this->conn->prepare($query);
        $smtp->execute();
        return $smtp->fetchAll(PDO::FETCH_OBJ);
    }

    public function show($id){
        $query = "SELECT * FROM $this->table WHERE id=?";
        $smtp = $this->conn->prepare($query);
        $smtp->execute([$id]);
        return $smtp->fetchAll(PDO::FETCH_OBJ);
    }

    public function create($title)
    {
        $query = "INSERT INTO $this->table(title) VALUES (?)";
        $smtp = $this->conn->prepare($query);
        $smtp->execute([$title]);
        return $smtp->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($title,$id)
    {
        $query = "UPDATE $this->table SET title = ? WHERE id=?";
        $smtp = $this->conn->prepare($query);
        $smtp->execute([$title,$id]);
        return $smtp->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id)
    {
        $query="DELETE FROM $this->table WHERE id=?";
        $smtp = $this->conn->prepare($query);
        $smtp->execute([$id]);
        return $smtp->fetch(PDO::FETCH_ASSOC);
    }
}