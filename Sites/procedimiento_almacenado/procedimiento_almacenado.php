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


  <?php
	foreach ($rows as $c) {
      echo 'Itinerario n°' . $c['tid']. 'Precio Total: ' .$c['total'];
      echo '
      <table>
      <tr> <th>Ciudad Origen</th> <th>Ciuedad destino</th> <th>Medio</th> <th>Hora Salida</th> <th>Duracion</th> <th>Precio</th> </tr>
      #Viaje 1
      <tr> <td>' .$c['c1'] . '</td> <td>' . $c['c2'] . '</td> <td>' . $c['medio1'] . '</td><td>' . $c['hora_salida1'] . '</td><td>' . $c['duracion1'] .'</td><td>' .$c['precio1']. '</td><tr>
      </table>';
	}
  ?>
	


  <!-- ======= Footer ======= -->
<?php include('../templates/main_footer.html')?>