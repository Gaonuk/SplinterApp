<?php require("../config/conexion.php");
  session_start();
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $nombreusuario = $_POST["nombre"];
    $direccion = $_POST["direccion"];

    #Verificamos que no exista el username
    $query_username_unico = "SELECT usuarios.username FROM usuarios WHERE usuarios.username = '$username';";
    $result = $db_impar -> prepare($query_username_unico);
    $result -> execute();
    $usuario = $result -> fetchAll();
    $rows = 0;
    foreach ($usuario as $u) {
        $rows++;
    }
    if ($rows == 0){
      $_SESSION["login_user"] = $username;
      header('location:index.php');

      $query = "SELECT usuarios.uid FROM usuarios ORDER BY usuarios.uid DESC;";
      $result = $db_impar -> prepare($query);
      $result -> execute();
      $uid = $result -> fetchAll();
      $uid = $uid[0][0];
      $uid++;

      $query2 = "INSERT INTO usuarios(uid, nombreusuario, username, correo, direccion) VALUES ($uid, $nombreusuario, $username, $email, $direccion);";
      $result2 = $db_impar -> prepare($query2);
      $result2 -> execute();
      $print2 = $result2 -> fetchAll();
      
      $_SESSION["user"] = $username;
      header('location:main.php');
    } else {
      $error = "Username ya existe, intente otra vez";
      
    }
  }
?>
<body>
Hubo un error:
<?php echo $error ?>
<h2><a href = "../index_par.php">Volver a intentar</a></h2>