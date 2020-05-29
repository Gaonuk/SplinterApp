<?php
	include "session.php";
	include "../config/conexion.php";
	$uid = intval($_SESSION['uid']);
	$mid = intval($_GET['mid']);
	$fecha = date("Y-m-d");
	$query = "INSERT INTO entradas(uid, mid, fechaactual) VALUES($uid, $mid, '$fecha');";
	$result = $db_impar -> prepare($query);
	$result -> execute();
	$entradas = $result -> fetchAll();
	header('location:museum_entrance.php');
?>