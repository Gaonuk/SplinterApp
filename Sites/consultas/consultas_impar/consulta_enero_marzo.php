<?php include('../templates/header.html');   ?>

<body>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

 	$query = "SELECT usuarios.uid, usuarios.nombreusuario, reservas.fechainicio, reservas.fechatermino, hoteles.nombrehotel FROM usuarios, reservas, hoteles WHERE usuarios.uid=reservas.uid AND hoteles.hid=reservas.hid AND reservas.fechainicio >= '2020-01-01' AND reservas.fechatermino <= '2020-03-31';";
	$result = $db_impar -> prepare($query);
	$result -> execute();
	$data = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>User ID</th>
      <th>Nombre Usuario</th>
      <th>Inicio Reserva</th>
      <th>Fin Reserva</th>
      <th>Nombre Hotel</th>
    </tr>
  <?php
	foreach ($data as $d) {
  		echo "<tr> <td>$d[0]</td> <td>$d[1]</td> <td>$d[2]</td> <td>$d[3]</td> <td>$d[4]</td> </tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
