<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $username = $_POST["username"];
  $ahora = date("Y-m-d");
  #Se construye la consulta como un string
 	$query = "SELECT ciudades.nombrepais, username FROM ciudades, hoteles, reservas, usuarios WHERE LOWER(usuarios.username) LIKE LOWER('%$username%') AND reservas.uid=usuarios.uid AND reservas.hid=hoteles.hid AND hoteles.nombreciudad=ciudades.cid AND reservas.fechainicio < '$ahora' GROUP BY nombrepais, username ORDER BY username;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db_impar -> prepare($query);
	$result -> execute();
	$usuarios = $result -> fetchAll();
  ?>

  <table>
    <tr>
      <th>Pais</th>
      <th>Nombre Usuario</th>
    </tr>
  
      <?php
        foreach ($usuarios as $u) {
          echo "<tr><td>$u[0]</td><td>$u[1]</td></tr>";
      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>
