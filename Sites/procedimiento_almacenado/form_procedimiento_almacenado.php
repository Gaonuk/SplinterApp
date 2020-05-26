<?php include('../templates/header.html')?>

  <main id="main">

<form action="procedimiento_almacenado.php" method="POST">

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
                <input type="checkbox" id="'. $value['nombre'] .'" value="'. $value['nombre'] .'" name="'. $value['nombre'] .'">
                <label for="'. $value['nombre'] .'">  '.$value['nombre'].'
                </label><br>
            </div>
            ';
        }

    ?>

<!--Datalist para la ciudad de origen-->
    <label for="ciudad_origen">Ciudad de Origen:</label><br>
    <input list="ciudades" name="ciudad_origen">
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
    </datalist><br>

<!--Date para la fecha de inicio-->
    <label for="fecha">Fecha:</fecha><br>
    <input type="date" id="fecha" name="fecha">
    <br>

<!--Sumbit boton envia a procedimiento_almacenado.php -->
    <input type="submit" value="Buscar" class="boton-busqueda">


</form>


<!-- ======= Footer ======= -->
<?php include('../templates/footer.html')?>