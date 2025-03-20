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
        <form id="expenseForm">
            <div class="form-contanier">
            <div class="form-group" >
                <label for="description" >Descrição da Despesa:</label></br>
                <input type="text" id="description" required>
            </div>
            <div class="form-group">
                <label for="value">Valor da Despesa:</label></br>
                <input type="number" id="value" required>
            </div>
            <div class="form-group">
                <label for="date">Data da Despesa:</label></br>
                <input type="date" id="date" required>
            </div>
            <div class="form-group">
                <label for="category">Categoria da Despesa:</label></br>
                <select id="category" class="expense" required>
                    <!-- Puxar categorias do banco de dados e usar um foreach com echo aqui, o 'value' vai ser o id da categoria -->
                    <option value="">Selecione uma categoria</option>
                    <option value="2">Alimentação</option>
                    <option value="3">Transporte</option>
                    <option value="4">Lazer</option>
                    <option value="5">Saúde</option>
                    <option value="6">Educação</option>
                </select>
            </div>
            <button type="submit" class="btn">Salvar</button>
        </div>
        </form>
        <div id="message" class="message"></div>
    </main>
    <script src="../assets/js/script.js"></script>
</body>
</html>