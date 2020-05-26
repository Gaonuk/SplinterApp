<?php
include ('session.php'); ?>
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
    <?php 
      require("../config/conexion.php");
      $result = pg_query($db_impar, "SELECT cid, nombreciudad from ciudades ");
      if (pg_num_rows($result) == 0)
    {
     echo "<option>No rows exist</option>";
    } else {
      while($row_list=pg_fetch_assoc($result)){
        ?>
      <option value="<?php echo $row_list["cid"]; ?>">
      <?php echo $row_list["nombreciudad"]; ?>
      </option>
<?php
      }
    }
      ?>
    </select>
  <input type="submit" value="Buscar">
 </form>
 <br>