<?php
include ('session.php');
$login_session = intval($login_session);
$fecha_viaje = $_POST["fecha_viaje"];
$ciudad_origen = $_POST["ciudad_origen"];
$ciudad_destino = $_POST["ciudad_destino"];
echo "ID Usuario: $login_session. Buscando viajes para $fecha_viaje";

$query = "SELECT partidas.nombreciudad, llegadas.nombreciudad, destinos.horasalida,
 destinos.duracion, destinos.medio, destinos.precio, destinos.did FROM destinos,ciudades AS partidas,
  ciudades AS llegadas WHERE partidas.cid = destinos.ciudadorigen AND 
  llegadas.cid = destinos.ciudaddestino AND destinos.ciudadorigen = '$ciudad_origen' AND 
  destinos.ciudaddestino = '$ciudad_destino';";
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
      <th>Comprar</th>
    </thead>
  <tbody>
  <?php
  foreach ($tickets as $t) {
    echo "<tr> 
    <td>$t[0]</td> 
    <td>$t[1]</td> 
    <td>$t[2]</td> 
    <td>$t[3]</td> 
    <td>$t[4]</td> 
    <td>$t[5]</td> 
    <td><form action='compra_tickets.php' method='post'>
    <div class='control'>
    <input type='hidden' name='destino', value=$t[6]>
    <input type='hidden' name='fecha', value=$fechaviaje>
    <input type='submit' value='Buscar' class='button is-primary'>
    </div>
 </form> </td></tr>";
  }
  ?>
  </tbody>
  </table>
