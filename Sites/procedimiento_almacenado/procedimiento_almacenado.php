<?php include('../templates/header.html')?>

  <main id="main">

<form>

<!--CheckBox para nombre de artistas-->
    <label for="nombre_artistas">Artistas:</label><br>
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
                <label for="'. $value['nombre'] .'">  '.$value['nombre'].'
                </label><br>
            </div>
            ';
        }

    ?>

<!--Datalist para la ciudad de origen-->
    <label for="ciudad_origen">Ciudad de Origen:</label><br>
    <input list="ciudades">
    <datalist id="ciudades">
    <?php

        require("../config/conexion.php");
        $query = "SELECT DISTINCT nombre FROM ciudades;";

        #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
        $result = $db_par -> prepare($query);
        $result -> execute();
        $rows = $result -> fetchAll();
        foreach ($rows as $key => $value){
            echo'
            <option value=" '. $value['nombre'] .' ">
            ';
        }
    ?>
    </datalist>

<!--Date para la fecha de inicio-->
    <label for="fecha">Fecha:</fecha><br>
    <input type="date" id="fecha" name="fecha">

</form>

<?php include("../templates/breadcrumbs.html")?>