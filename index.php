<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <h2>Index Page</h2>
</body>
</html>

<?php

require "./model/Expense.php";

$myExpense = new Expense("Celular novo", 1999.99, 5);
$myExpense->saveToDatabase();