<?php
include ('session.php');
$login_session = intval($login_session);
echo "ID Usuario: $login_session.";
$query = "SELECT reservas.fechainicio, reservas.fechatermino, hoteles.nombrehotel, hoteles.telefono FROM usuarios, reservas, hoteles WHERE usuarios.uid = reservas.uid and reservas.hid = hoteles.hid and usuarios.uid = $login_session;";
$result = $db_impar -> prepare($query);
$result -> execute();
$reserva = $result -> fetchAll();
?>
 <table>
    <thead>
      <th>Inicio Reserva</th>
      <th>Fin Reserva</th>
      <th>Nombre Hotel</th>
      <th>Teléfono Hotel</th>>
    </thead>
  <tbody>
  <?php
  foreach ($reserva as $r) {
    echo "<tr> <td>$r[0]</td> <td>$r[1]</td> <td>$r[2]</td> <td>$r[3]</td></tr>";
  }
  ?>
  </tbody>
  </table>
