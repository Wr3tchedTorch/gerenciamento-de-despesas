<?php

try {
    $connection = new PDO("mysql:host=localhost;dbname=ExpenseManager", "root", "FEe909071806743");
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo $e->getMessage();
}