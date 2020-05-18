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
        array_push($nombre_artistas, $value )
      }
    }

?>

<?php

require("../config/conexion.php");

#Se construye la consulta como un string
$query = 'SELECT DISTINCT ubica_en.cid AS cid, artistas.nombre AS nombre
FROM artistas, ciudades, obras, obras_en, realizo, ubica_en
WHERE artistas.aid = realizo.aid AND obras.oid = realizo.oid AND obras.oid = obras_en.oid AND ubica_en.lid = obras_en.lid
AND artistas.nombre IN (\''.implode("','", $nombre_artista).'\')';

#Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
$result = $db_par -> prepare($query);
$result -> execute();
$rows = $result -> fetchAll();
foreach ($rows as $key => $value){
    echo ' ' .$value['cid'] . ' de '.$value['nombre'] .' ';
}

?>