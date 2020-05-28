<?php
  try {
    #Pide las variables para conectarse a la base de datos.
    require('data.php');
    # Se crea la instancia de PDO
    $db_par = new PDO("pgsql:dbname=$databaseName1;host=146.155.13.72;port=5432;user=$user1;password=$password1");
    $db_impar = new PDO("pgsql:dbname=$databaseName2;host=146.155.13.72;port=5432;user=$user2;password=$password2");

  } catch (Exception $e) {
    echo "No se pudo conectar a la base de datos: $e";
  }
?>