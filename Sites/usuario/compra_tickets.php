<?php
include ('session.php');
$login_session = intval($login_session);
$fecha_viaje = $_POST["fecha"];
$destino_id = intval($_POST["destino"]);
echo "ID Usuario: $login_session. Buscando viajes para $fecha_viaje, para el destino $destino_id";

$query = "SELECT COUNT(tickets.did), destinos.duracion FROM destinos, tickets WHERE tickets.did = destinos.did AND 
  tickets.did = $destino_id AND tickets.fecha_viaje = '$fecha_viaje';";
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
