<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");
  $pais = strtolower($_POST["pais"]);
  $pais1 = ucfirst(strtolower($_POST["pais"]));
 	$query = "SELECT nombreciudad, nombrepais FROM ciudades where nombrepais like '%$pais%' or nombrepais like '%$pais1%';";
	$result = $db -> prepare($query);
	$result -> execute();
	$ciudades = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>Nombre Ciudad</th>
      <th>Nombre Pais</th>
    </tr>
  <?php
	foreach ($ciudades as $c) {
  		echo "<tr><td>$c[0]</td> <td>$c[1]</td></tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
