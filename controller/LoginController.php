<?php
    session_start();
      if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $login=true;

        if ($email == 'admin@admin.com' && $password == 'admin') {  
          $_SESSION['user']=$email;
          header("location: ../view/menu.php");
          die();
        } else {
          $login=false;
        }
        include '../view/login.php';
      }

  
?>