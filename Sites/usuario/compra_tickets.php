<?php
include ('session.php');
$login_session = intval($login_session);
$fecha_viaje = $_POST["fecha_viaje"];
echo "ID Usuario: $login_session. Buscando viajes para $fecha_viaje";

$query = "SELECT partidas.nombreciudad, llegadas.nombreciudad, destinos.horasalida, destinos.duracion, destinos.medio, destinos.precio FROM destinos, ciudades AS partidas, ciudades AS llegadas WHERE partidas.cid = destinos.ciudadorigen and llegadas.cid = destinos.ciudaddestino;";
$result = $db_impar -> prepare($query);
$result -> execute();
$tickets = $result -> fetchAll();
?>
 <table>
    <thead>
      <th>Ciudad Origen</th>
      <th>Ciudad Destino</th>
      <th>Hora Salida</th>
      <th>Duración</th>
      <th>Medio de Transporte</th>
      <th>Precio</th>
    </thead>
  <tbody>
  <?php
  foreach ($tickets as $t) {
    echo "<tr> <td>$t[0]</td> <td>$t[1]</td> <td>$t[2]</td> <td>$t[3]</td> <td>$t[4]</td> <td>$t[5]</td> </tr>";
  }
  ?>
  </tbody>
  </table>
