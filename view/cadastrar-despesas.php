<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("location: login.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Despesas</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <header>
        <h1>Cadastrar Despesas</h1>
    </header>
    <main>
        <form id="expenseForm" method="post" action="../controller/ExpenseController.php">
            <div class="form-contanier">
                <div class="form-group">
                    <label for="description">Descrição da Despesa:</label></br>
                    <input type="text" id="description" name="description" required>
                </div>
                <div class="form-group">
                    <label for="value">Valor da Despesa:</label></br>
                    <input type="number" id="value" name="value" required>
                </div>
                <div class="form-group">
                    <label for="date">Data da Despesa:</label></br>
                    <input type="date" id="date" name="date" required>
                </div>
                <div class="form-group">
                    <label for="category">Categoria da Despesa:</label></br>
                    <select id="category" class="expense" name="category" required>
                        <!-- Puxar categorias do banco de dados e usar um foreach com echo aqui, o 'value' vai ser o id da categoria -->
                        <option value="">Selecione uma categoria</option>
                        <?php
                        require '../model/Category.php';
                        $category = Category::getAll();
                        foreach ($category as $key => $value) {
                            echo '<option value="' . $value['id'] . '">' . $value['name']
                                . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn">Salvar</button>
                <a href="menu.php" type="" class="btn">Voltar</a>
            </div>
        </form>
        <div id="message" class="message"></div>
        <?php
        require '../model/Expense.php';
        $expenses = Expense::getAll();

        if ($expenses->rowCount() > 0) {
            echo '<section>
            <h2>Despesas Cadastradas</h2>
            <div id="expenseList">
                <table border="1">
                    <thead>
                        <tr>
                            <th>Descrição</th>
                            <th>Valor (R$)</th>
                            <th>Data</th>
                            <th>Categoria</th>
                        </tr>
                    </thead>
                    <tbody>';

            while ($row = $expenses->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                <td>{$row['description']}</td>
                <td>{$row['cost']}</td>
                <td>{$row['data']}</td>
                <td>{$row['category_name']}</td>
              </tr>";
            }

            echo "      </tbody>
                </table>
            </div>
          </section>";
        } 
        ?>


    </main>
    <script src="../assets/js/script.js"></script>
</body>

</html>