<?php
include ('session.php');
$login_session = intval($login_session);
$fecha_inicio = $_POST["fecha_inicio"];
$fecha_fin = $_POST["fecha_fin"];
$ciudad = $_POST["ciudad"];
echo "ID Usuario: $login_session. Buscando viajes para $ciudad";

$query = "SELECT ciudades.nombreciudad, hoteles.nombrehotel,
 hoteles.direccionhotel, hoteles.telefono, hoteles.precionoche, hoteles.hid FROM hoteles, ciudades 
 WHERE hoteles.nombreciudad = ciudades.cid AND hoteles.nombreciudad = '$ciudad';";
$result = $db_impar -> prepare($query);
$result -> execute();
$hoteles = $result -> fetchAll();
?>
 <table>
    <thead>
      <th>Ciudad </th>
      <th>Nombre Hotel</th>
      <th>Dirección</th>
      <th>Teléfono Contacto</th>
      <th>Precio por Noche</th>
      <th>Reservar</th>
    </thead>
  <tbody>
  <?php
  foreach ($hoteles as $h) {
    echo "<tr> 
    <td>$h[0]</td> 
    <td>$h[1]</td> 
    <td>$h[2]</td> 
    <td>$h[3]</td> 
    <td>$h[4]</td> 
    <td><form action='compra_hotel.php' method='post'>
    <div class='control'>
    <input type='hidden' name='hotel', value=$t[6]>
    <input type='hidden' name='fecha_inicio', value=$fecha_inicio>
    <input type='hidden' name='fecha_fin', value=$fecha_fin>
    <input type='submit' value='Buscar' class='button is-primary'>
    </div>
 </form> </td></tr>";
  }
  ?>
  </tbody>
  </table>
