<?php require("config/conexion.php");
  session_start();
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $query = "SELECT usuarios.uid FROM usuarios WHERE usuarios.username = '$username' AND usuarios.correo = '$email';";
    $result = $db -> prepare($query);
    $result -> execute();
    $usuario = $result -> fetchAll();
    $rows = 0;
    foreach ($usuario as $u) {
        $rows+=1;
    }
    
    if ($rows == 1){
      $_SESSION["login_user"] = $username;
      echo "HOLA";

      header("location: index.php");
    } else {
        $error = "Nombre o Email Inválido";
      }
  }
  ?>
<html>
Hola
</html>
