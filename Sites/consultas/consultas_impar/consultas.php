<html>
<body>
<h3 align="center"> 1. Usuarios junto a su correo</h3>

<form align="center" action="consultas/consulta_usuarios_correo.php" method="post">
  <input type="submit" value="Buscar">
</form>

<br>
<br>
<br>

<h3 align="center"> 2. Ciudades de la agencia pertenecientes a cierto pais</h3>

<form align="center" action="consulta_ciudades.php" method="post">
  Pais:
  <input type="text" name="pais">
  <br/><br/>
  <input type="submit" value="Buscar">
</form>

<br>
<br>
<br>

<h3 align="center">3. Paises visitados por el usuario con cierto username </h3>

<form align="center" action="consulta_username.php" method="post">
  Username:
  <input type="text" name="username">
  <br/><br/>
  <input type="submit" value="Buscar">
</form>
<br>
<br>
<br>

<h3 align="center">4. Dinero gastado en tickets por un usuario con cierto id</h3>

<form align="center" action="consulta_dinero_tickets.php" method="post">
  User ID:
  <input type="text" name="user_id">
  <br/><br/>
  <input type="submit" value="Buscar">
</form>
<br>
<br>

<h3 align="center">5. Reservas hechas entre el 1 de Enero de 2020 y 31 de Marzo de 2020</h3>

<form align="center" action="consulta_enero_marzo.php" method="post">
  <input type="submit" value="Buscar">
</form>
<br>
<br>

<h3 align="center">6. Dinero gastado en reservas de hoteles por cada usuario entre 2 fechas</h3>

<form align="center" action="consulta_dinero_hoteles.php" method="post">
Fecha Inicio
<input type="text" name="F1">
<br/><br/>
Fecha Fin
<input type="text" name="F2">
<br/><br/>
<input type="submit" value="Buscar">
</form>
<br>
<br>

<br>
<br>
<br>
<br>
</body>
</html>
