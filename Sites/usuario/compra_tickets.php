<?php
include ('session.php');
$login_session = intval($login_session);
$fecha_viaje = $_POST["fecha"];
$destino_id = intval($_POST["destino"]);
echo "ID Usuario: $login_session. Buscando viajes para $fecha_viaje, para el destino $destino_id";

$query = "SELECT COUNT(tickets.tid), destinos.capacidad FROM destinos LEFT JOIN tickets 
ON destinos.did = tickets.did AND tickets.fechaviaje = '$fecha_viaje' WHERE destinos.did = $destino_id GROUP BY destinos.did;";
$result = $db_impar -> prepare($query);
$result -> execute();
$tickets = $result -> fetchAll();
?>
 <table>
    <thead>
      <th>Tickets Comprados</th>
      <th>Capacidad</th>
      <th>Tickets Disponibles</th>
    </thead>
  <tbody>
  <?php
  foreach ($tickets as $t) {
    echo "<tr> 
    <td>$t[0]</td> 
    <td>$t[1]</td> 
    <td>$t[1]-$t[0] </td></tr>";
  }
  ?>
  </tbody>
  </table>
<?php
$query = "SELECT MAX(tid) FROM tickets;";
$result = $db_impar -> prepare($query);
$result -> execute();
$tid = $result -> fetchAll();
$tid = $tid[0][0]++;

if ($tickets[0][1]>$tickets[0][0]){
  $query = "INSERT INTO tickets(uid, asiento, fechacompra, fechaviaje, did, tid) VALUES($login_session, ($tickets[0][0]+1), date('Y-m-d H:i:s'), '$fecha_viaje', $destino_id, $tid);";
  $result = $db_impar -> prepare($query);
  $result -> execute();
  $tickets = $result -> fetchAll();
  header('location:tickets.php');
}else{
  $error = "No quedan cupos en el viaje solicitado."
}
?>
<body>
Hubo un error:
<?php echo $error ?>
<h2><a href = "../main.php">Volver a intentar</a></h2>
