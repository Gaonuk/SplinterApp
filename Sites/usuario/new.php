<?php require("../config/conexion.php");
  session_start();
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $nombreusuario = $_POST["nombre"];
    $direccion = $_POST["direccion"];
    $query = "SELECT usuarios.uid FROM usuarios ORDER BY usuarios.uid DESC;";
    $result = $db_impar -> prepare($query);
    $result -> execute();
    $uid = $result -> fetchAll();
    $rows = 0;
    $uid = $uid[0][0];
    $uid++;
    $query2 = "INSERT INTO usuarios(uid, nombreusuario, username, correo, direccion) VALUES ($uid, $nombreusuario, $username, $email, $direccion);";
    $result2 = $db_impar -> prepare($query2);
    $result2 -> execute();
    $print2 = $result2 -> fetchAll();
  }
?>
