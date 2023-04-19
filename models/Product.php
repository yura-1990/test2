<?php

class Product
{
    private $conn;
    private $table = 'products';

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

    public function create($title, $category_id)
    {
        $query = "INSERT INTO $this->table(title, category_id) VALUES (?, ?)";
        $smtp = $this->conn->prepare($query);
        $smtp->execute([$title, $category_id]);
        return $smtp->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $title, $category_id )
    {
        $query = "UPDATE $this->table SET title = ?, category_id = ? WHERE id=?";
        $smtp = $this->conn->prepare($query);
        $smtp->execute([$title, $category_id, $id]);
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