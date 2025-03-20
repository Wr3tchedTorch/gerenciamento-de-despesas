<?php
require '../connection.php';

function getExpensesGraph($selectedMonth)
{
    global $connection; 

    //obter a categoria e armazenar em query
    $query = "SELECT e.description AS descricao, 
                     c.name AS categoria, 
                     e.cost AS valor, 
                     MONTH(e.date) AS mes 
              FROM expense e
              INNER JOIN category c ON e.categoryid = c.id";

    //query seleciona todos os items de acordo com o parametro mes caso não seja todos
    if ($selectedMonth !== "todos") {
        $query .= " WHERE MONTH(e.date) = :mes";
    }

    //prepara a query para ser utilizada
    $query = $connection->prepare($query);

    if ($selectedMonth !== "todos") {
        $query->bindParam(':mes', $selectedMonth, PDO::PARAM_INT);
    }

    //utiliza a query
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function getExpensesTable() {
    global $connection;
    
    //querry para a tabelan essa pega a data inteira ao inves de apenas o mes
    $query = "SELECT e.description AS descricao, 
                     c.name AS categoria, 
                     e.cost AS valor, 
                     e.date AS data_completa 
              FROM expense e
              INNER JOIN category c ON e.categoryid = c.id";

    $x = $connection->prepare($query);
    $x->execute();
    return $x->fetchAll(PDO::FETCH_ASSOC);
}
?>