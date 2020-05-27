<?php
include ('session.php');
include "../templates/main_header.html"; ?>
<br>
Reserva Hotel
 <br>
 <form align="center" action="busca_hotel.php" method="post">
  Fecha Inicio
  <br>
  <div class="field">
  <div class="control has-icons-left">
    <input type="date" name="fecha_inicio" class="input" placeholder="Fecha Llegada">
    <span class="icon is-medium is-left">
    <i class="fas fa-calendar"></i>
  </span>
  </div>
  </div>
  <br>
  <div class="field">
  Fecha Fin
  <br>
  <div class="field">
  <div class="control has-icons-left">
    <input type="date" name="fecha_fin" class="input" placeholder="Fecha Salida">
    <span class="icon is-medium is-left">
    <i class="fas fa-calendar"></i>
  </span>
  </div>
  </div>
  <br>
  <div class="field">
  Ciudad: 
    <div class="control has-icons-left"> 
      <div class="select">
      <select name="ciudad"> 
      <option value="">Ciudad</option> 
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