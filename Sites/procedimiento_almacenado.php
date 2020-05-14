<?php include('templates/header.html')?>

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
            <input type="checkbox" name="artista[]" id="'. $value['nombre'] . '" value="Artistas">
            <label for="Artistas">Artistas</label>
        </div>
        ';
    }
?>

<?php include("templates/breadcrumbs.html")?>