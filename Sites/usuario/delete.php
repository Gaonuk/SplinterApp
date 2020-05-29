<?php require("../config/conexion.php");
  session_start();
$query_delete = DELETE FROM usuarios WHERE usuario = $_SESSION["user"];
$result = $db_impar -> prepare($query_delete);
$result -> execute();
header("Location: ../index.php");
?>