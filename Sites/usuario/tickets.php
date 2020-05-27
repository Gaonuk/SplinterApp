<?php
include ('session.php');
include "../templates/main_header.html";
$login_session = intval($login_session);
$query = "SELECT tickets.fechacompra, tickets.fechaviaje, tickets.asiento, partidas.nombreciudad, llegadas.nombreciudad, destinos.horasalida, destinos.duracion, destinos.medio FROM usuarios, tickets, destinos, ciudades AS partidas, ciudades AS llegadas WHERE usuarios.uid = tickets.uid and tickets.did = destinos.did and usuarios.uid = $login_session and partidas.cid = destinos.ciudadorigen and llegadas.cid = destinos.ciudaddestino;";
$result = $db_impar -> prepare($query);
$result -> execute();
$tickets = $result -> fetchAll();
?>
<section class="hero is-light">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Hola, <?php echo $_SESSION["user"]; ?>
      </h1>
      <h2 class="subtitle">
        Aquí puedes ver tus tickets de transporte
      </h2>
    </div>
  </div>
</section>
<div class="columns is-centered">
 <table class="table">
    <thead>
      <th>Fecha Compra</th>
      <th>Fecha Viaje</th>
      <th>Número Asiento</th>
      <th>Ciudad Origen</th>
      <th>Ciudad Destino</th>
      <th>Hora Salida</th>
      <th>Duración</th>
      <th>Medio de Transporte</th>
    </thead>
  <tbody>
  <?php
  foreach ($tickets as $t) {
    echo "<tr> <td>$t[0]</td> <td>$t[1]</td> <td>$t[2]</td> <td>$t[3]</td> <td>$t[4]</td> <td>$t[5]</td> <td>$t[6]</td> <td>$t[7]</td> </tr>";
  }
  ?>
  </tbody>
  </table>
</div>
<footer class="footer">
  <div class="content has-text-centered">
    <a href="main.php">Volver</a>
  </div>
</footer>
<?php include "../templates/main_footer.html"; ?>