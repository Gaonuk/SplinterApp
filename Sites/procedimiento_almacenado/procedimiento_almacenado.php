<?php include('../templates/header.html')?>

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
    echo ' '.$ciudad_origen.'  '.$fecha.'  '.implode(',',$nombre_artistas).' ';
    $query = 'SELECT * FROM itinerario(\''.$fecha.'\', \''.$ciudad_origen.'\', \''.implode(',', $nombre_artistas).'\')';
    echo $query;
    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
    $result = $db_impar -> prepare($query);
    $result -> execute();
    $rows = $result -> fetchAll();
?>

<table>
    <tr>
      <th>tid</th>
      <th>c1</th>
      <th>c2</th>
      <th>hora_salida</th>
      <th>duracion</th>
      <th>medio</th>
      <th>precio</th>
      <th>c3</th>
      <th>c4</th>
      <th>hora_salida</th>
      <th>duracion</th>
      <th>medio</th>
      <th>precio</th>
      <th>c5</th>
      <th>c6</th>
      <th>hora_salida</th>
      <th>duracion</th>
      <th>medio</th>
      <th>precio</th>
    </tr>
  <?php
	foreach ($rows as $c) {
  		echo "<tr><td>$c[0]</td> <td>$c[1]</td> <td>$c[2]</td></tr>";
	}
  ?>
	</table>