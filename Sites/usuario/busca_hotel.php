<?php
include ('session.php');
include "../templates/main_header.html";
$login_session = intval($login_session);
$fecha_inicio = $_POST["fecha_inicio"];
$fecha_fin = $_POST["fecha_fin"];
$ciudad = $_POST["ciudad"];

$query = "SELECT ciudades.nombreciudad, hoteles.nombrehotel,
 hoteles.direccionhotel, hoteles.telefono, hoteles.precionoche, hoteles.hid FROM hoteles, ciudades 
 WHERE hoteles.nombreciudad = ciudades.cid AND hoteles.nombreciudad = '$ciudad';";
$result = $db_impar -> prepare($query);
$result -> execute();
$hoteles = $result -> fetchAll();
?>
<section class="hero is-light">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Hola, <?php echo $_SESSION["user"]; ?>
      </h1>
    </div>
  </div>
</section>
<div class="columns is-centered">
 <table class="table">
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
    <input type='hidden' name='hotel', value=$h[5]>
    <input type='hidden' name='fecha_inicio', value=$fecha_inicio>
    <input type='hidden' name='fecha_fin', value=$fecha_fin>
    <input type='submit' value='Buscar' class='button is-primary'>
    </div>
 </form> </td></tr>";
  }
  ?>
  </tbody>
  </table>
</div>
<?php include "../templates/main_footer.html"; ?>