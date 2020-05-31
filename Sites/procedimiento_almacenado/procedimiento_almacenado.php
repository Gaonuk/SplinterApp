<?php
	include "../usuario/session.php";
	include('../templates/main_header.html') ?>
<?php
	$ciudad_origen = substr($_POST["ciudad_origen"], 1, -1);
	$fecha = $_POST["fecha"];

?>

<?php
	$nombre_artistas = array();
	foreach ($_POST as $key => $value) {
		if ($key != "fecha" and $key != "ciudad_origen") {
			array_push($nombre_artistas, $value);
		}
	}
?>

<?php
	require("../config/conexion.php");
	$query = 'SELECT * FROM f_itinerario(\'' . $fecha . '\', \'' . $ciudad_origen . '\', \'' . implode(',', $nombre_artistas) . '\')';
	#Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db_impar->prepare($query);
	$result->execute();
	$rows = $result->fetchAll();
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
					<a class="navbar-item" href="../usuario/logout.php">
						<div>
                                <span class="icon is-small">
                                  <i class="fa fa-sign-out"></i>
                                </span>
							Sign Out
						</div>
					</a>
					<a class="navbar-item" href="../usuario/delete.php">
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
						<form method="post" name="search" action="../usuario/search.php">
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
								<a href="../usuario/main.php">
													<span class="icon">
															<i class="fa fa-user"></i>
													</span>
									Mi Perfil
								</a>
							</li>
							<li>
								<a href="../usuario/artistas.php">
													<span class="icon">
															<i class="fa fa-paint-brush"></i>
													</span>
									Artistas
								</a>
							</li>
							<li>
								<a href="../usuario/obras.php">
													<span class="icon">
															<i class="fa fa-image"></i>
													</span>
									Obras
								</a>
							</li>
							<li>
								<a href="../usuario/lugares.php">
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
								<a class="is-active">
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
								<a href="../usuario/nuevo_ticket.php">
								<span class="icon">
									<i class="fas fa-ticket-alt"></i>
								</span>
									Comprar Tickets
								</a>
							</li>
							<li>
								<a href="../usuario/nuevo_hotel.php">
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
						<h1 class="title">
							Aqui esta tu itinerario!
						</h1>
					</div>
				</div>
				<div class="section">
					<div class="columns is-multiline">
						
						<?php $tid = 0 ?>
						<?php foreach ($rows as $c) { ?>
							<?php $tid += 1 ?>
							<div class="column is-12-tablet is-6-desktop is-6-widescreen">
								<article class="box">
									<h3 class="title is-4">Itinerario n° <?php echo $tid ?> </h3>
									<h3 class="title is-5">Precio Total: <?php echo $c['total'] ?> </h3>
									<div class="media">

										
										<table class="table">
											<!-- Header -->
											<tr>
												<th>Ciudad Origen</th>
												<th>Ciuedad destino</th>
												<th>Medio</th>
												<th>Hora Salida</th>
												<th>Duracion</th>
												<th>Precio</th>
											</tr>
											<!-- Primer Viaje -->
											<tr>
												<td><?php echo $c['c1'] ?></td>
												<td><?php echo $c['c2'] ?></td>
												<td><?php echo $c['medio1'] ?></td>
												<td><?php echo $c['hora_salida1'] ?></td>
												<td><?php echo $c['duracion1'] ?></td>
												<td><?php echo $c['precio1'] ?></td>
											</tr>
											<!-- Segundo Viaje -->
											<?php if ($c['c3'] != '') { ?>
												<tr>
													<td><?php echo $c['c3'] ?></td>
													<td><?php echo $c['c4'] ?></td>
													<td><?php echo $c['medio2'] ?></td>
													<td><?php echo $c['hora_salida2'] ?></td>
													<td><?php echo $c['duracion2'] ?></td>
													<td><?php echo $c['precio2'] ?></td>
												</tr>
											<?php } ?>
											<!-- Tercer Viaje -->
											<?php if ($c['c5'] != '') { ?>
												<tr>
													<td><?php echo $c['c5'] ?></td>
													<td><?php echo $c['c6'] ?></td>
													<td><?php echo $c['medio3'] ?></td>
													<td><?php echo $c['hora_salida3'] ?></td>
													<td><?php echo $c['duracion3'] ?></td>
													<td><?php echo $c['precio3'] ?></td>
												</tr>
											<?php } ?>
										</table>
									</div>
								</article>
							</div>
						
						
						<?php } ?>
					</div>
					<a href="form_procedimiento_almacenado.php" class="button is-info">Volver</a>
				</div>
			</main>
		</div>
	</section>

	<!-- ======= Footer ======= -->
<?php include('../templates/main_footer.html') ?>