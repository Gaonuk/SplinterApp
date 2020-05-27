<?php
include('../config/conexion.php');
$login_session = intval($_SESSION["uid"]);
$fecha_viaje = $_POST["fecha"];
$destino_id = intval($_POST["destino"]);

$query = "SELECT COUNT(tickets.tid), destinos.capacidad FROM destinos LEFT JOIN tickets 
ON destinos.did = tickets.did AND tickets.fechaviaje = '$fecha_viaje' WHERE destinos.did = $destino_id GROUP BY destinos.did;";
$result = $db_impar -> prepare($query);
$result -> execute();
$tickets = $result -> fetchAll();

$query = "SELECT MAX(tid) FROM tickets;";
$result = $db_impar -> prepare($query);
$result -> execute();
$tid = $result -> fetchAll();
$tid = $tid[0][0]++;

if ($tickets[0][1]>$tickets[0][0]){
  $asiento = $tickets[0][0]+1;
  $date = date('Y-m-d H:i:s');
  $_SESSION["user"] = $username;
  $query = "INSERT INTO tickets(uid, asiento, fechacompra, fechaviaje, did, tid) VALUES($login_session, $asiento, '$date', '$fecha_viaje', $destino_id, $tid);";
  $result = $db_impar -> prepare($query);
  $result -> execute();
  $error = "Comprando asiento $asiento, como usuario $login_session, para el viaje $destino_id, del dia $fecha_viaje. Comprado el $date";
  $tickets = $result -> fetchAll();
  #header('location:tickets.php');
}else{
  $error = "No quedan cupos en el viaje solicitado.";
}
?>
<body>
Hubo un error:
<?php echo $error ?>
<h2><a href = "../main.php">Volver a intentar</a></h2>
