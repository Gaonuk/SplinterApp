<?php include('../templates/header.html');   ?>

<body>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

 	$query = "SELECT username, correo FROM usuarios;";
	$result = $db_par -> prepare($query);
	$result -> execute();
	$usuarios = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>Username</th>
      <th>Correo</th>
    </tr>
  <?php
	foreach ($usuarios as $u) {
  		echo "<tr> <td>$u[0]</td> <td>$u[1]</td> </tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
