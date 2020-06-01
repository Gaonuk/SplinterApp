<?php
	session_start();
	include "../templates/main_header.html";
	include('../config/conexion.php');
	$n_buscar = $_POST['nombre'];
	if ($n_buscar != '') {
		$query = "select aid, nombre, descripcion, foto_url from artistas where lower(nombre) like lower('%$n_buscar%') UNION (select oid, nombre, tipo, foto_url from obras where lower(nombre) like lower('%$n_buscar%')) UNION (select lid, nombre, tipo, foto_url from lugares where lower(nombre) like lower('%$n_buscar%'));";
		$result = $db_par->prepare($query);
		$result->execute();
		$resultados = $result->fetchAll();
	} else {
		$query = "select aid, nombre, descripcion, foto_url from artistas UNION (select oid, nombre, tipo, foto_url from obras) UNION (select lid, nombre, tipo, foto_url from lugares);";
		$result = $db_par->prepare($query);
		$result->execute();
		$resultados = $result->fetchAll();
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
								<a href="artistas.php">
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
						<h1 class="title">Busqueda</h1>
					</div>
				</div>
				<div class="section">
					<nav class="level">
						<div class="level-left">
							<div class="level-item">
								<p class="subtitle is-5">
									<strong><?php echo count($resultados) ?></strong> Resultados
								</p>
							</div>
						</div>
					</nav>
					<div class="columns is-multiline">
						<?php foreach ($resultados as $r) { ?>
							<div class="column is-12-tablet is-6-desktop is-4-widescreen">
								<article class="box">
									<div class="media">
										<aside class="media-left">
											<img src="<?php echo $r[3] ?>" width="80" alt="">
										</aside>
										<div class="media-content">
											<?php if (in_array($r[2], ['plaza', 'museo', 'iglesia'])) { ?>
												<p class="title is-5 is-marginless">
													<a href="lugar.php?lugar_id=<?php echo $r[0] ?>&tipo=<?php echo $r[2] ?>"><?php echo $r[1] ?></a>
												</p>
												<p class="subtitle is-marginless">
													Lugar de tipo: <strong><?php echo $r[2] ?></strong>
												</p>
											<?php } elseif (in_array($r[2], ['pintura', 'fresco', 'escultura'])) { ?>
												<p class="title is-5 is-marginless">
													<a href="obra.php?obra_id=<?php echo $r[0] ?>&tipo=<?php echo $r[2]?>"><?php echo $r[1] ?></a>
												</p>
												<p class="subtitle is-marginless">
													Obra de tipo: <strong><?php echo $r[2] ?></strong>
												</p>
											<?php } else { ?>
												<p class="title is-5 is-marginless">
													<a href="artista.php?artista_id=<?php echo $r[0] ?>"><?php echo $r[1] ?></a>
												</p>
												<p class="content is-small">
													<?php echo $r[2] ?>
												</p>
											<?php } ?>


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