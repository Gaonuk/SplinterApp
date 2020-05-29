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

<table>
    <tr>
      <th>c1</th>
      <th>c2</th>
      <th>hora_salida</th>
      <th>medio</th>
      <th>c3</th>
      <th>c4</th>
      <th>hora_salida</th>
      <th>medio</th>
      <th>c5</th>
      <th>c6</th>
      <th>hora_salida</th>
      <th>medio</th>
      <th>total</th>
    </tr>
  <?php
	foreach ($rows as $c) {
  		echo "<tr> <td>$c[0]</td> <td>$c[1]</td> <td>$c[2]</td></tr> <td>$c[3]</td> <td>$c[4]</td> <td>$c[5]</td> <td>$c[6]</td> <td>$c[7]</td> <td>$c[8]</td> <td>$c[9]</td> <td>$c[10]</td> <td>$c[11]</td> <td>$c[12]</td> </tr>";
	}
  ?>
	</table>


  <!-- ======= Footer ======= -->
<?php include('../templates/main_footer.html')?>