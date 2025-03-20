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
    <title>Perfil do Usuário</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <h1>Perfil do Usuário</h1>
    </header>
    <main>
        <section class="perfil-container">
            <form action="" method="post">
                <div class="perfil-info">
                    <img src="../assets/pfp-pic.jpg" alt="Foto de Perfil" class="perfil-img">
                    <h2 id="userName">Nome do Usuário</h2>
                    <p id="userEmail"><?php
                      echo $_SESSION['user']; ?></p>
                </div>
                <button id="editProfileBtn" class="btn-profile" name="logout">Logout</button>
            </form>
        </section>
    </main>
   
    <script src="../assets/js/script.js"></script>
</body>
</html>
<?php
  if (isset($_POST['logout'])) {
    session_destroy();
    header("location: login.php");
  }
?>