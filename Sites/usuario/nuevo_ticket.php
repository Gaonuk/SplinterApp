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
     <select name="ciudad_origen"> 
     <option value="">--- Select ---</option> 
    <?php
      $query = "SELECT cid, nombreciudad from ciudades;";
      $result = $db_impar -> prepare($query);
      $result -> execute();
      $ciudades = $result -> fetchAll();
      foreach($ciudades as $c){
        ?>
      <option value="<?php echo $c[0]; ?>">
      <?php echo $c[1]; ?>
      </option>
<?php
      }
      ?>
    </select>
  Ciudad destino: 
     <select name="ciudad_destino"> 
     <option value="">--- Select ---</option> 
    <?php
      $query = "SELECT cid, nombreciudad from ciudades;";
      $result = $db_impar -> prepare($query);
      $result -> execute();
      $ciudades = $result -> fetchAll();
      foreach($ciudades as $c){
        ?>
      <option value="<?php echo $c[0]; ?>">
      <?php echo $c[1]; ?>
      </option>
<?php
      }
      ?>
    </select>
  <input type="submit" value="Buscar">
 </form>
 <br>