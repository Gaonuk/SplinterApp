<?php require("../config/conexion.php");
	session_start();
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$username = $_POST["username"];
		$password = $_POST["password"];
		$query = "SELECT usuarios.uid FROM usuarios WHERE usuarios.username = '$username' AND usuarios.password = '$password';";
		$result = $db_impar->prepare($query);
		$result->execute();
		$usuario = $result->fetchAll();
		$rows = 0;
		foreach ($usuario as $u) {
			$rows++;
			$uid = $u[0];
		}
		if ($rows == 1) {
			$_SESSION["user"] = $username;
			$_SESSION["uid"] = $uid;
			header('location:main.php');
			
		} else {
			$error = "Nombre o Email Inválido: $password";
			
		}
	}
	include "../templates/main_header.html";
?>
	<h1 class="title is-1">Hubo un error:</h1>
	<h1 class="title"><?php echo $error ?></h1>
	<br>
	<a href="../index_par.php" class="button is-info">Volver a intentar</a>
	</div>
<?php include "../templates/main_footer.html"; ?>