<?php
   include('../config/conexion.php');
   session_start();
   
   $user_check = $_SESSION['user'];
   
   $query = "SELECT usuarios.uid FROM usuarios WHERE usuarios.username = '$user_check';";
   $result = $db_impar -> prepare($query);
   $result -> execute();
   $usuario = $result -> fetchAll();
   $login_session = $usuario[0][0];

   if(!isset($_SESSION['user'])){
      header("location:../index_par.php");
      die();
   }
?>