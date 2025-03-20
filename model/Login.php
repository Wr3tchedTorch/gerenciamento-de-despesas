<?php
  class Login {
    public static function validateLogin(){
      require '../connection.php';
            
            $sql = "SELECT * FROM usuarios WHERE usuario = ? AND senha = ?";
            $stm = $connection->prepare($sql);
            $stm->bindParam(1, $usuarioDigitado);
            $stm->bindParam(2, $senhaDigitada);
            $stm->execute();
            $resultado = $stm->rowCount();
            if($resultado>0){
                return true;
            }
            else
            {
                return false;
            }

    }
  }
?>