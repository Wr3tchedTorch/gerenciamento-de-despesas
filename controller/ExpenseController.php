<?php

require '../model/Expense.php';

class ExpenseController {
    public function createExpense() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $description = $_POST['description'] ?? null;
            $cost = $_POST['value'] ?? null;
            $date = $_POST['date'] ?? null;
            $categoryId = $_POST['category'] ?? null;

            if ($description && $cost && $date && $categoryId) {
                try {
                    $expense = new Expense($description, $cost, $categoryId, $date);
                    $expense->saveToDatabase();
                    header("location: ../view/cadastrar-despesas.php");
                } catch (Exception $e) {
                    echo "<script>alert('Erro: " . $e->getMessage() . "'); window.location.href='../view/cadastrar-despesas.php';</script>";
                }
            } else {
                echo "<script>alert('Todos os campos são obrigatórios.'); window.location.href='../view/cadastrar-despesas.php';</script>";
            }
        }
    }
}

$controller = new ExpenseController();
$controller->createExpense();