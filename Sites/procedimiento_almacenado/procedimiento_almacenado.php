<?php include('../templates/main_header.html')?>

  <main id="main">

<?php
    $ciudad_origen = substr($_POST["ciudad_origen"], 1, -1);
    $fecha = $_POST["fecha"];

?>

<?php
    $nombre_artistas = array();
    foreach ($_POST as $key =>$value){
      if ($key != "fecha" AND $key != "ciudad_origen") {
        array_push($nombre_artistas, $value );
      }
    }
?>

<?php
    require("../config/conexion.php");
    $query = 'SELECT * FROM f_itinerario(\''.$fecha.'\', \''.$ciudad_origen.'\', \''.implode(',', $nombre_artistas).'\')';
    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
    $result = $db_impar -> prepare($query);
    $result -> execute();
    $rows = $result -> fetchAll();
?>




<?php foreach ($rows as $c) { ?>
  <h3> Itinerario n° <?php echo $c['tid']?> Precio Total: <?php echo $c['total'] ?> </h3>
  <table>
    <!-- Header -->
    <tr> <th>Ciudad Origen</th> <th>Ciuedad destino</th> <th>Medio</th> <th>Hora Salida</th> <th>Duracion</th> <th>Precio</th> </tr>
    <!-- Primer Viaje -->
    <tr>
      <td><?php echo $c['c1'] ?></td> <td><?php echo $c['c2'] ?></td> <td><?php echo $c['medio1'] ?></td> <td><?php echo $c['hora_salida1'] ?></td> <td><?php echo $c['duracion1'] ?></td> <td><?php echo $c['precio1'] ?></td>
    </tr>
    <!-- Segundo Viaje -->
    <?php if ($c['c3'] != '') { ?>
    <tr>
      <td><?php echo $c['c3'] ?></td> <td><?php echo $c['c4'] ?></td> <td><?php echo $c['medio2'] ?></td> <td><?php echo $c['hora_salida2'] ?></td> <td><?php echo $c['duracion2'] ?></td> <td><?php echo $c['precio2'] ?></td>
    </tr>
    <?php } ?>
    <!-- Tercer Viaje -->
    <?php if ($c['c5'] != '') { ?>
    <tr>
      <td><?php echo $c['c5'] ?></td> <td><?php echo $c['c6'] ?></td> <td><?php echo $c['medio3'] ?></td> <td><?php echo $c['hora_salida3'] ?></td> <td><?php echo $c['duracion3'] ?></td> <td><?php echo $c['precio3'] ?></td>
    </tr>
    <?php } ?>
  </table>



<?php } ?>

  <!-- ======= Footer ======= -->
<?php include('../templates/main_footer.html')?>