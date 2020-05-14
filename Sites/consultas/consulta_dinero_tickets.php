<?php include('../templates/header.html');   ?>

<body>

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  $var = $_POST["user_id"];
  $var = intval($var);
  $ahora = date("Y-m-d");
  $query = "SELECT SUM(destinos.precio) FROM destinos, tickets where destinos.did = tickets.did and tickets.uid = $var and tickets.fechacompra::date <= '$ahora' group by tickets.uid;";
  $result = $db -> prepare($query);
  $result -> execute();
  $dinero = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  
  ?>
  <table>
    <tr>
      <th>Total Gastado</th>
    </tr>
  <?php
  foreach ($dinero as $d) {
    echo "<tr> <td>$d[0]</td> </tr>";
    
  }
  ?>
  </table>

<?php include('../templates/footer.html'); ?>
