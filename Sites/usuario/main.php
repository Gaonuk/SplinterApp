<h1> Bienvenido, <?php $_SESSION["user"] ?></h1>

<p>¿Qué deseas hacer? </p>
<br>
Ver mis entradas a museos
<br>
<h2><a href = "museum_entrance.php">Ver entradas</a></h2>

<br>
Ver mis reservas de hoteles
<br>
<h2><a href = "hotels.php">Ver entradas</a></h2>

<br>
Ver mis tickets de transporte
<br>
<h2><a href = "tickets.php">Ver entradas</a></h2>

<br>
Comprar Tickets
<br>
  <form align="center" action="compra_tickets.php" method="post">
    Fecha Viaje
    <br>
    <input type="text" name="fecha_viaje">
    <br>
    Ciudad origen:  
      <select Nombre Ciudad='NEW'>  
      <option value="">--- Select ---</option>  
      <?php require("../config/conexion.php");  
          $select="ciudades";  
          if (isset ($select)&&$select!=""){  
          $select=$_POST ['NEW'];  
      }  
      ?>  
      <?  
        $conn = pg_pconnect("dbname=$db_impar")
        $result = pg_query($conn, "SELECT nombreciudad from ciudades;"); 
        while($row_list=pg_fetch_array($list)){
          ?>
          <option value=<?php echo $row_list["id"]; ?>>
          <?php echo $row_list["name"]; ?> 
          </option>
          <?php
          }
          ?>
          </select>
          ?>  
      <input type="submit" value="Buscar"> 
  </form>
  <br>