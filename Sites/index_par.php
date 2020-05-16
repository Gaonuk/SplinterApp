<?php include('templates/header.html');
  ?>

<body>
<h3 align="center"> Iniciar Sesión</h3>
<form align="center" action="usuario/login.php" method="post">
    Username
    <input type="text" name="username">
    <br/><br/>
    Email
    <input type="text" name="email">
    <br/><br/>
    <input type="submit" value="Buscar"> 
  </form>
  <br>
  <body>
<h3 align="center">Nuevo Usuario</h3>
<form align="center" action="usuario/new.php" method="post">
    Username
    <input type="text" name="username">
    <br/><br/>
    Email
    <input type="text" name="email">
    <br/><br/>
    Nombre Completo
    <input type="text" name="nombre">
    <br/><br/>
    Dirección
    <input type="text" name="direccion">
    <br/><br/>

    <input type="submit" value="Crear"> 
  </form>
  <h1 align="center">Consultas </h1>
  <br>
  <h2><a href = "consultas/consultas_impar/consultas.php">Ver consultas</a></h2>
