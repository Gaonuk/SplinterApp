<?php include('../templates/header.html')?>

  <main id="main">

<?php
    $ciudad_origen = $_POST["ciudad_origen"];
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
    /*
    #Se construye la consulta como un string

    $query = 'SELECT DISTINCT ubica_en.cid AS cid, artistas.nombre AS nombre
    FROM artistas, ciudades, obras, obras_en, realizo, ubica_en
    WHERE artistas.aid = realizo.aid AND obras.oid = realizo.oid AND obras.oid = obras_en.oid AND ubica_en.lid = obras_en.lid
    AND artistas.nombre IN  (\''.implode("','", $nombre_artistas).'\')      ';

    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
    $result = $db_par -> prepare($query);
    $result -> execute();
    $rows = $result -> fetchAll();
    #Guarda todos los cid que se quieren visitar.
    $ciudades = array()
    foreach ($rows as $key => $value){
        array_push($ciudades, $value['cid'])
        echo ' ' .$value['cid'] . ' de '.$value['nombre'] .' ';
    }

    */
    echo ' '.$ciudad_origen.'  '.$fecha.'  '.implode(',',$nombre_artistas).' ';
    $query = 'SELECT * FROM itinerario(\''.$fecha.'\', \''.$ciudad_origen.'\', \''.implode(',', $nombre_artistas).'\')';
    echo $query
    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
    $result = $db_impar -> prepare($query);
    $result -> execute();
    $rows = $result -> fetchAll();
?>

<table>
    <tr>
      <th>Ciudad Origen</th>
      <th>Ciudad Destino</th>
      <th>Escalas</th>
    </tr>
  <?php
	foreach ($rows as $c) {
  		echo "<tr><td>$c[0]</td> <td>$c[1]</td> <td>$c[2]</td></tr>";
	}
  ?>
	</table>