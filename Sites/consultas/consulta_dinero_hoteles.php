<?php include('../templates/header.html');   ?>

<body>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

	$F1 = $_POST["F1"];
	$F2 = $_POST["F2"];

 	$query = "SELECT usuarios.uid, SUM(destinos.precio) FROM usuarios, tickets, destinos WHERE usuarios.uid = tickets.uid AND tickets.did = destinos.did AND tickets.fechacompra >= '$F1' AND tickets.fechacompra <= '$F2' GROUP BY usuarios.uid;";
	$result = $db_par -> prepare($query);
	$result -> execute();
	$usuario = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>User ID</th>
      <th>Total Gastado</th>
    </tr>
  <?php
	foreach ($usuario as $u) {
  		echo "<tr> <td>$u[0]</td> <td>$u[1]</td> </tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
