<?php include('../templates/header.html')?>

  <main id="main">

<?php

    require("../config/conexion.php");

    #Se construye la consulta como un string
    $query = "SELECT DISTINCT nombre FROM artistas;";

    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
    $result = $db_par -> prepare($query);
    $result -> execute();
    $rows = $result -> fetchAll();
    foreach ($rows as $key => $value){
        echo '
        <div class="label-container">
            <input type="checkbox" id="nombre_artista" value="'. $value['nombre'] .'" name="'. $value['nombre'] .'">
            <label for="'. $value['nombre'] .'">  '$value['nombre']'
            </label><br>
        </div>
        ';
    }
?>

<?php include("../templates/breadcrumbs.html")?>