<?php
 session_start();
  if (isset($_SESSION['user'])) {
    header("location: menu.php");
    die();
  }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Gerenciador de Despesas</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <h1>Login</h1>
    </header>
    <main>
        <section>
            <form id="loginForm" action="../controller/LoginController.php" method="post">
                <div>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="admin@admin.com" required>
                </div>
                <div>
                    <label for="password">Senha:</label>
                    <input type="password" id="password" name="password" value="admin" required>
                </div>
                <div id="error-message" class="error-message"></div>
                <button type="submit" class="btn-login">Entrar</button>
            </form>
        </section>
    </main>
    <script src="../assets/js/script.js"></script>
</body>
</html>
<?php
  if(isset($login)){
    if($login == false){
        echo "Login ou senha inválido";
    }
  }
?>