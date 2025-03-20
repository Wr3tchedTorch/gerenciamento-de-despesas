<?php

class Expense
{
    public $id;
    public $description;
    public $cost;
    public $date;
    public $categoryId;

    public function __construct($description, $cost, $categoryId, $date = DATE_ATOM, $id = null)
    {
        $this->description = $description;
        $this->cost = $cost;
        $this->categoryId = $categoryId;
        $this->date = $date;
        $this->id = $id;
    }

    public function saveToDatabase()
    {
        require "connection.php";

        $sql = $id == null ? "insert into (description, cost, date, categoryId) values (?, ?, ?, ?)" : "insert into (description, cost, date, categoryId, id) values (?, ?, ?, ?, ?)";

        $connection->prepare($sql);
        $connection->bindValue(1, $this->description);
        $connection->bindValue(2, $this->cost);
        $connection->bindValue(3, $this->date);
        $connection->bindValue(4, $this->categoryId);
        if ($id != null) {
            $connection->bindValue(2, $this->id);
        }

        if (!$connection->execute()) {
            throw new Exception("Erro ao salvar dados do produto no banco.");
        }
    }

    public static function getAll()
    {
        require "connection.php";

        $sql = "select e.id, e.description as \"description\", e.cost as \"cost\", e.date as \"data\", c.id as \"category_id\", c.name as \"category_name\"
                from expense e
                left join category c on c.id = e.categoryId;";
        return $connection->query($sql);
    }
}