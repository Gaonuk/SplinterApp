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
    <input type="submit" value="Buscar"> 
  </form>
  <br>