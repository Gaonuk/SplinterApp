<?php
	session_start();
	include "../templates/main_header.html";
	include('../config/conexion.php');
	$n_buscar = $_POST['nombre'];
	if ($n_buscar != '') {
		$query = "SELECT * FROM artistas WHERE LOWER(nombre) LIKE LOWER('%$n_buscar%');";
		$result = $db_par->prepare($query);
		$result->execute();
		$artistas = $result->fetchAll();
	}
	else {
		$query = "SELECT * FROM artistas GROUP BY artistas.aid;";
		$result = $db_par->prepare($query);
		$result->execute();
		$artistas = $result->fetchAll();
	}
?>

<div class="navbar-menu">
	<div class="navbar-end">
		<div class="navbar-item has-dropdown is-hoverable">
			<div class="navbar-link">
				<figure class="image is-24x24 is-rounded">
					<img src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png" alt="">
				</figure>
				<?php echo $_SESSION["user"] ?>
			</div>
			<div class="navbar-dropdown">
				<a class="navbar-item" href="logout.php">
					<div>
                                <span class="icon is-small">
                                  <i class="fa fa-sign-out"></i>
                                </span>
						Sign Out
					</div>
				</a>
				<a class="navbar-item" href="delete.php">
					<div>
                                <span class="icon is-small">
                                  <i class="fa fa-ban"></i>
                                </span>
						Delete Account
					</div>
				</a>
			</div>
		</div>
	</div>
</div>
</nav>

<section class="">
	<div class="columns is-gapless">
		<div class="column is-4-tablet is-3-desktop is-2-widescreen">
			<div style="background-color: #f5f5f5; padding: 1.5rem; min-height: calc(100vh - 3.25rem); overflow: auto;">
				<aside class="menu ">
					<p class="menu-label">
						Buscar en la aplicacion
					</p>
					<form method="post" name="search" action="search.php">
						<div class="field has-addons">
							<div class="control has-icons-left">
								<input class="input is-rounded" type="text" placeholder="Buscar artista, lugar..." name="nombre">
								<span class="icon is-small is-left">
										<i class="fas fa-search"></i>
									</span>
							</div>
							<div class="control">
								<input type="submit" class="button is-info" value="Buscar">
							</div>
						</div>
					</form>
					<p class="menu-label">
						General
					</p>
					<ul class="menu-list">
						<li>
							<a href="main.php">
													<span class="icon">
															<i class="fa fa-user"></i>
													</span>
								Mi Perfil
							</a>
						</li>
						<li>
							<a class="is-active">
													<span class="icon">
															<i class="fa fa-paint-brush"></i>
													</span>
								Artistas
							</a>
						</li>
						<li>
							<a href="obras.php">
													<span class="icon">
															<i class="fa fa-image"></i>
													</span>
								Obras
							</a>
						</li>
						<li>
							<a href="lugares.php">
													<span class="icon">
															<i class="fas fa-map-marker-alt"></i>
													</span>
								Lugares
							</a>
						</li>
					</ul>
					<p class="menu-label">
						Itinerario
					</p>
					<ul class="menu-list">
						<li>
							<a href="../procedimiento_almacenado/form_procedimiento_almacenado.php">
								<span class="icon">
									<i class="fas fa-clipboard-list"></i>
								</span>
								Crear Itinerario
							</a>
						</li>
					</ul>
					<p class="menu-label">
						Compras
					</p>
					<ul class="menu-list">
						<li>
							<a href="nuevo_ticket.php">
								<span class="icon">
									<i class="fas fa-ticket-alt"></i>
								</span>
								Comprar Tickets
							</a>
						</li>
						<li>
							<a href="nuevo_hotel.php">
								<span class="icon">
									<i class="fas fa-hotel"></i>
								</span>
								Hacer Reserva de Hotel
							</a>
						</li>
					</ul>
				</aside>
			</div>
		</div>
		<main class="column">
			<div class="hero is-primary">
				<div class="hero-body">
					<h1 class="title">Artistas</h1>
				</div>
			</div>
			<div class="section">
				<nav class="level">
					<div class="level-left">
						<div class="level-item">
							<p class="subtitle is-5">
								<strong><?php echo count($artistas) ?></strong> Artistas
							</p>
						</div>
						<div class="level-item is-hidden-tablet-only">
							<div class="field has-addons">
								<form method="post" name="searchlugares" action="artistas.php">
									<div class="field has-addons">
										<div class="control">
											<input class="input" type="text" placeholder="Buscar por nombre, letra,..." name="nombre">
										</div>
										<div class="control">
											<input type="submit" class="button is-info" value="Search">
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</nav>
				<div class="columns is-multiline">
					<?php foreach ($artistas as $a) { ?>
						<div class="column is-12-tablet is-6-desktop is-4-widescreen">
							<article class="box">
								<div class="media">
									<aside class="media-left">
										<img src="<?php echo $a[5] ?>" width="80" alt="">
									</aside>
									<div class="media-content">
										<p class="title is-5 is-marginless">
											<a href="artista.php?artista_id=<?php echo $a[0] ?>"><?php echo $a[1] ?></a>
										</p>
										<p class="subtitle is-marginless">
											<?php echo $a[2] ?>
											<br>
											<?php
												if ($a[3] <= date('Y-m-d')) {
													echo $a[3];
												}
												else {
													echo '';
												}
											?>
										</p>
										<div class="content is-small">
											<?php echo $a[4] ?>
										</div>
									</div>
							</article>
						</div>
					<?php } ?>
				</div>
			</div>

		</main>
	</div>
</section>


<?php include "../templates/main_footer.html"; ?>
<!--<br>-->
<!--Comprar Tickets-->
<!--<br>-->
<!--  <form align="center" action="compra_tickets.php" method="post">-->
<!--    Fecha Viaje-->
<!--    <br>-->
<!--    <input type="text" name="fecha_viaje">-->
<!--    <br>-->
<!--    Ciudad origen:  -->
<!--      <select Nombre Ciudad='NEW'>  -->
<!--      <option value="">--- Select ---</option>  -->
<!--      --><?php //require("../config/conexion.php");
	//          $select="ciudades";
	//          if (isset ($select)&&$select!=""){
	//          $select=$_POST ['NEW'];
	//      }
	//      ?><!--  -->
<!--      --><? //
	//        $conn = pg_pconnect("dbname=$db_impar");
	//        $result = pg_query($conn, "SELECT cid, nombreciudad from ciudades;");
	//        while($row_list=pg_fetch_array($result)){
	//          ?>
<!--          <option value=--><?php //echo $row_list["cid"]; ?><!---->
<!--          --><?php //echo $row_list["nombreciudad"]; ?><!-- -->
<!--          </option>-->
<!--          --><?php
	//          }
	//          ?>
<!--          </select>-->
<!--          ?>  -->
<!--      <input type="submit" value="Buscar"> -->
<!--  </form>-->
<!--  <br>-->
