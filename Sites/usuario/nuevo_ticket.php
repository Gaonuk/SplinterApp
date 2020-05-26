<?php
include ('session.php');
include "../templates/main_header.html"; ?>
<br>
Comprar Tickets
 <br>
 <form align="center" action="compra_tickets.php" method="post">
  Fecha Viaje
  <br>
  <input type="text" name="fecha_viaje">
  <br>
  Ciudad origen:
    <div class="control has-icons-left"> 
      <div class="select">
      <select name="ciudad_origen"> 
      <option value="">Ciudad Origen</option> 
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
      </div>
      <div class="icon is-small is-left">
      <i class="fas fa-city"></i>
      </div>
    </div>
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