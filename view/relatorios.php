<?php
include '../controller/ReportsController.php';
// Usando a URL para passar o mês atual 
$selectedMonth = $_GET['mes'] ?? "todos";
$expenses = getExpensesGraph($selectedMonth);
$categories = [];
$allExpenses = getExpensesTable();

// Agrupar
// Gráfico de pizza
foreach ($expenses as $expense) {
    $category = $expense["categoria"];
    $categories[$category] = ($categories[$category] ?? 0) + $expense["valor"];
}

// Gráfico de barras
$meses = array_fill(1, 12, 0);
foreach ($expenses as $expense) {
    $mes = $expense["mes"];
    $meses[$mes] += $expense["valor"];
}
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatórios</title>
    <link rel="stylesheet" href="../assets/css/css_relatorios.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <header class="header-relatorios">

        Relatórios

    </header>

    <!-- Gráficos -->
    <div class="dashboard">
        <div class="box">
            <h1 class="title">Despesas</h1>
            <div class="menu-drop select-container">
                <!-- Select para escolher o mês -->
                <form  method="GET" action="">
                    <label for="mes"></label>
                    <select class="custom-select" name="mes" id="mes" onchange="this.form.submit()">
                        <option value="todos" <?= $selectedMonth == "todos" ? "selected" : "" ?>>Todos os Meses</option>
                        <?php
                            $monthDictionary = [1 => "Janeiro", 2 => "Fevereiro", 3 => "Março", 4 => "Abril", 5 => "Maio", 6 => "Junho", 7 => "Julho", 8 => "Agosto", 9 => "Setembro", 10 => "Outubro", 11 => "Novembro", 12 => "Dezembro"];
                            
                            for ($i = 1; $i <= 12; $i++) {
                                $selected = ($selectedMonth == $i) ? "selected" : "";
                                echo "<option value='$i' $selected>{$monthDictionary[$i]}</option>";
                            }
                        ?>
                    </select>
                </form>
            </div>
        </div>
        <div class="graficos">
            <div class="graphs">
                <h2>Despesas por categoria</h2>
                <canvas id="graficoPizza"></canvas>
            </div>
            <div class="graphs">
                <h2>Balanço Mensal</h2>
                <canvas id="graficoBarras"></canvas>
            </div>
        </div>

        <!-- Tabela de Despesas -->
        <div class="tabela-container">
            <h2>Registro de Despesas</h2>
            <table>
                <thead>
                    <tr>
                        <th>Descrição</th>
                        <th>Categoria</th>
                        <th>Valor</th>
                        <th>Data</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($allExpenses as $expense): ?>
                        <tr>
                            <td><?= htmlspecialchars($expense['descricao']) ?></td>
                            <td><?= htmlspecialchars($expense['categoria']) ?></td>
                            <td>R$ <?= number_format($expense['valor'], 2, ',', '.') ?></td>
                            <td><?= date('d/m/Y', strtotime($expense['data_completa'])) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>

        // Dados do gráfico de Pizza
        const categories$categories = <?php echo json_encode(array_keys($categories)); ?>;
        const valores = <?php echo json_encode(array_values($categories)); ?>;
        
        
        //configuração do chart js grafico pizza
        const ctxPizza = document.getElementById('graficoPizza').getContext('2d');
        new Chart(ctxPizza, {
            type: 'pie',
            data: {
                labels: categories$categories,
                datasets: [{
                    data: valores,
                    backgroundColor: ['red', 'blue', 'green', 'yellow', 'purple'],
                }]
            }
        });

        //configuração do chart js grafico barras
        const meses = <?php echo json_encode(array_values($meses)); ?>;
        const ctxBarras = document.getElementById('graficoBarras').getContext('2d');

        const selectedMonth = "<?php echo $selectedMonth; ?>";
        let dadosBarras = meses;

        if (selectedMonth !== "todos") {
            const mesIndex = parseInt(selectedMonth) - 1;
            dadosBarras = new Array(12).fill(0);
            dadosBarras[mesIndex] = meses[mesIndex];
        }

        new Chart(ctxBarras, {
            type: 'bar',
            data: {
                labels: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
                datasets: [{
                    label: 'Gastos por Mês',
                    data: dadosBarras,
                    backgroundColor: 'blue',
                }]
            }
        });
    </script>
</body>

</html>