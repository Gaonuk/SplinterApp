<?php require("../config/conexion.php");
  session_start();
  if (session_destroy()){
    header("Location: ../index_par.php");
  }
?>