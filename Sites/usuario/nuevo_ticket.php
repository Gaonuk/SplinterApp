<?php
include ('session.php');
include "../templates/main_header.html"; ?>
<br>
Comprar Tickets
 <br>
 <form align="center" action="compra_tickets.php" method="post">
  Fecha Viaje
  <br>
  <div class="field">
  <div class="control has-icons-left">
    <input type="date" name="fecha_viaje" class="input" placeholder="Fecha Viaje">
    <span class="icon is-medium is-left">
    <i class="fas fa-calendar"></i>
  </span>
  </div>
  </div>
  <br>
  <div class="field">
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
  </div>
  <div class="field">
  Ciudad destino: 
    <div class="control has-icons-left"> 
      <div class="select">
      <select name="ciudad_destino"> 
      <option value="">Ciudad Destino</option> 
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
  </div>
  <div class="control">
    <input type="submit" value="Buscar" class="button is-primary">
  </div>
 </form>
 <br>
 <?php include "../templates/main_footer.html"; ?>