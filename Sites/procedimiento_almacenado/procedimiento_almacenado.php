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




<?php for foreach ($rows as $c) { ?>
  <h3> Itinerario n° <?php echo $c['tid']?> Precio Total: <?php echo $c['total'] ?> </h3>
  <table>
    <!-- Header -->
    <tr> <th>Ciudad Origen</th> <th>Ciuedad destino</th> <th>Medio</th> <th>Hora Salida</th> <th>Duracion</th> <th>Precio</th> </tr>
    <!-- Primer Viaje -->
    <tr>
      <td><?php echo $c['c1'] ?></td> <td><?php echo $c['c2'] ?></td> <td><?php echo $c['medio1'] ?></td> <td><?php echo $c['hora_salida1'] ?></td> <td><?php echo $c['duracion1'] ?></td> <td><?php echo $c['precio1'] ?></td>
    </tr>
  </table>



<?php } ?>

  <!-- ======= Footer ======= -->
<?php include('../templates/main_footer.html')?>