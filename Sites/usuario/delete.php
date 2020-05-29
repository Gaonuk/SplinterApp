<?php require("../config/conexion.php");
	session_start();
	$username = $_SESSION['user'];
	$query_delete = "DELETE FROM usuarios WHERE username = '$username';";
	$result = $db_impar->prepare($query_delete);
	$result->execute();
	header("Location: ../index_par.php");
?>