<?php require("../config/conexion.php");
  session_start();
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $query = "SELECT usuarios.uid FROM usuarios WHERE usuarios.username = '$username' AND usuarios.correo = '$email';";
    $result = $db_impar -> prepare($query);
    $result -> execute();
    $usuario = $result -> fetchAll();
    $rows = 0;
    foreach ($usuario as $u) {
        $rows++;
    }
    if ($rows == 1){
      $_SESSION["login_user"] = $username;
      header('location:index.php');
    
    } else {
        $error = "Nombre o Email Inválido";
        
      }
  }
  ?>
<body>
Hubo un error:
<?php echo $error ?>
<h2><a href = "../index_par.php">Volver a intentar</a></h2>
