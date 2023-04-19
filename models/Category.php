<?php

class Category
{
    private $conn;
    private $table = 'categories';

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

    public function create($title, $catalog_id)
    {
        $query = "INSERT INTO $this->table(title, catalog_id) VALUES (?, ?)";
        $smtp = $this->conn->prepare($query);
        $smtp->execute([$title,$catalog_id]);
        return $smtp->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $title, $catalog_id )
    {
        $query = "UPDATE $this->table SET title = ?, catalog_id = ? WHERE id=?";
        $smtp = $this->conn->prepare($query);
        $smtp->execute([$title, $catalog_id, $id]);
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