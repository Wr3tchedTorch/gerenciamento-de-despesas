<?php

try {
    $connection = new PDO("mysql:host=localhost;dbname=ExpenseManager", "phpuser", "1234");
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo $e->getMessage();
}