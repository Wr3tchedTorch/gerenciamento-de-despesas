<?php

class Category 
{
    public $id;
    public $name;

    public function __construct($name, $id=null)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function saveToDatabase()
    {
        require "connection.php";

        $sql = $id == null ? "insert into (name) values (?)" : "insert into (name, id) values (?, ?)";

        $statement = $connection->prepare($sql);
        $statement->bindValue(1, $this->name);
        if ($id != null) 
        {
            $statement->bindValue(2, $this->id);
        }

        if (!$statement->execute())
        {
            throw new Exception("Erro ao salvar dados da categoria no banco.");
        }
    }

    public static function getId($id) 
    {
        require "connection.php";

        $sql = "select * from category where id = ?";
        $statement = $connection->prepare($sql);
        $statement->bindValue(1, $id);

        if ($statement->execute())
        {
            return $statement->fetch();
        }

        throw new Exception("Erro na consulta do ID: {$id}");
    }

    public static function getAll() 
    {
        require "connection.php";

        $sql = "select * from category";
        return $connection->query($sql);
    }
}