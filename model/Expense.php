<?php

class Expense
{
    public $id;
    public $description;
    public $cost;
    public $date;
    public $categoryId;

    public function __construct($description, $cost, $categoryId, $date = null, $id = null)
    {
        $this->description = $description;
        $this->cost = $cost;
        $this->categoryId = $categoryId;
        $this->date = $date ?? date("Y-m-d H:i:s");
        $this->id = $id;
    }

    public function saveToDatabase()
    {
        require "connection.php";

        echo $this->date;
        $sql = isset($id) ? "insert into Expense (description, cost, date, categoryId, id) values (?, ?, ?, ?, ?)" : 
                            "insert into Expense (description, cost, date, categoryId)     values (?, ?, ?, ?)";

        $statement = $connection->prepare($sql);
        $statement->bindValue(1, $this->description);
        $statement->bindValue(2, $this->cost);
        $statement->bindValue(3, $this->date);
        $statement->bindValue(4, $this->categoryId);

        if (isset($id)) 
        {
            $statement->bindValue(5, $this->id);
        }

        if (!$statement->execute()) 
        {
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