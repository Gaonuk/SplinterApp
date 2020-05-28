<?php
include('session.php');
include "../templates/main_header.html";
$login_session = intval($login_session);
$query = "SELECT reservas.fechainicio, reservas.fechatermino, hoteles.nombrehotel, hoteles.telefono FROM usuarios, reservas, hoteles WHERE usuarios.uid = reservas.uid and reservas.hid = hoteles.hid and usuarios.uid = $login_session;";
$result = $db_impar -> prepare($query);
$result -> execute();
$reserva = $result -> fetchAll();
?>
</nav>
<section class="hero">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Hola, <?php echo $_SESSION["user"]; ?>
      </h1>
      <h2 class="subtitle">
        Aquí puedes ver tus reservas de hoteles
      </h2>
    </div>
  </div>
</section>
<div class="columns is-centered">
 <table class="table">
    <thead>
      <th>Inicio Reserva</th>
      <th>Fin Reserva</th>
      <th>Nombre Hotel</th>
      <th>Teléfono Hotel</th>
    </thead>
  <tbody>
  <?php
  foreach ($reserva as $r) {
    echo "<tr> <td>$r[0]</td> <td>$r[1]</td> <td>$r[2]</td> <td>$r[3]</td></tr>";
  }
  ?>
  </tbody>
  </table>
</div>
<div class="content has-text-centered">
  <a href="main.php">Volver</a>
</div>
<?php include "../templates/main_footer.html"; ?>
