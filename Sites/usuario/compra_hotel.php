<?php
include('../config/conexion.php');
session_start();
$login_session = intval($_SESSION["uid"]);
$fecha_inicio = $_POST["fecha_inicio"];
$fecha_fin = $_POST["fecha_fin"];
$hotel_id = intval($_POST["hotel"]);

$query = "SELECT MAX(rid) FROM reservas;";
$result = $db_impar -> prepare($query);
$result -> execute();
$rid = $result -> fetchAll();
$rid = $rid[0][0]+1;

$query = "INSERT INTO reservas(rid, uid, fechainicio, fechatermino, hid) VALUES($rid, $login_session, '$fecha_inicio', '$fecha_fin', $hotel_id);";
$result = $db_impar -> prepare($query);
$result -> execute();
$error = "Reservando en el hotel $hotel_id, como usuario $login_session, para los dias $fecha_inicio a $fecha_fin, reserva $rid";
$reservas = $result -> fetchAll();
#header('location:hotels.php');
?>
<body>
Hubo un error:
<?php echo $error ?>
<h2><a href = "main.php">Volver a intentar</a></h2>
