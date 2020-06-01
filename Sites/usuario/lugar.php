<?php
	session_start();
	
	include "../templates/main_header.html";
	include('../config/conexion.php');
	$lugar_id = $_GET['lugar_id'];
	$tipo = $_GET['tipo'];
	$lugar_id = intval($lugar_id);
	$query2 = "SELECT obras.oid, obras.nombre, obras.fecha_in, obras.fecha_fin, obras.periodo, obras.foto_url, obras.tipo FROM obras, lugares, obras_en WHERE lugares.lid = obras_en.lid and obras.oid = obras_en.oid and lugares.lid = $lugar_id;";
	$result2 = $db_par->prepare($query2);
	$result2->execute();
	$obras = $result2->fetchAll();
	$query3 = "Select DISTINCT artistas.aid, artistas.nombre, artistas.foto_url from artistas, realizo, (SELECT obras.oid, obras.nombre, obras.fecha_in, obras.fecha_fin, obras.periodo, obras.foto_url FROM obras, lugares, obras_en WHERE lugares.lid = obras_en.lid and obras.oid = obras_en.oid and lugares.lid = $lugar_id) as obras_lugar where obras_lugar.oid = realizo.oid and artistas.aid = realizo.aid;";
	$result3 = $db_par->prepare($query3);
	$result3->execute();
	$artistas = $result3->fetchAll();
	$query4 = "SELECT ciudades.nombre, ciudades.pais FROM lugares, ciudades, ubica_en WHERE ubica_en.lid = lugares.lid AND ubica_en.cid = ciudades.cid AND lugares.lid = $lugar_id;";
	$result4 = $db_par->prepare($query4);
	$result4->execute();
	$ciudad = $result4->fetchAll();
	$ciudad = $ciudad[0];
	if ($tipo == 'iglesia') {
		$query = "SELECT lugares.lid, lugares.nombre, lugares.foto_url, iglesias.horario_in, iglesias.horario_fin FROM lugares, iglesias WHERE lugares.lid = iglesias.lid and lugares.lid=$lugar_id;";
		$result = $db_par->prepare($query);
		$result->execute();
		$lugar = $result->fetchAll();
		$lugar = $lugar[0];
		
	} elseif ($tipo == 'plaza') {
		$query = "SELECT lugares.lid, lugares.nombre, lugares.foto_url FROM lugares WHERE lid=$lugar_id;";
		$result = $db_par->prepare($query);
		$result->execute();
		$lugar = $result->fetchAll();
		$lugar = $lugar[0];
		
	} else {
		$query = "SELECT lugares.lid, lugares.nombre, lugares.foto_url, museos.horario_in, museos.horario_fin, museos.precio FROM lugares, museos WHERE museos.lid = lugares.lid and lugares.lid=$lugar_id;";
		$result = $db_par->prepare($query);
		$result->execute();
		$lugar = $result->fetchAll();
		$lugar = $lugar[0];
		if (isset($_POST['submit'])) {
			someFunction();
		}
		function someFunction() {
			$message = "Compra realizada con exito!";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
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
								<a class="is-active">
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
				<div class="section">
					<nav class="breadcrumb " aria-label="breadcrumbs ">
						<ul>
							<li>
								<a href="lugares.php">Lugares</a>
							</li>
							<li class="is-active">
								<a>Ver Lugar</a>
							</li>
						</ul>
					</nav>
					<h1 class="title">
						<span class="has-text-grey-light"><?php echo $tipo ?></span> <strong><?php echo $lugar[1] ?></strong>
					</h1>

					<form>
						<div class="columns is-desktop">
							<div class="column is-4-desktop is-3-widescreen">
								<figure class="image">
									<img src="<?php echo $lugar[2] ?>" width="120" alt="Placeholder image">
								</figure>
								<br>
								<p class="heading">
									<strong>Ciudad donde se ubica este lugar: </strong>
								</p>
								<p class="content">
									<?php echo $ciudad[0] ?>
								</p>
								<p class="heading">
									<strong>Pais al que pertenece este lugar:</strong>
								</p>
								<p class="content">
									<?php echo $ciudad[1]?>
								</p>
								<?php if ($tipo != 'plaza') { ?>
									<p class="heading">
										<strong>Horario de Apertura</strong>
									</p>
									<p class="content">
										<?php echo $lugar[3] ?>
									</p>
									<p class="heading">
										<strong>Horario de Cierre</strong>
									</p>
									<p class="content">
										<?php echo $lugar[4] ?>
									</p>
								<?php } ?>
								
								<?php if ($tipo == 'museo') {?>
									<p class="heading">
										<strong>Precio de Entrada</strong>
									</p>
									<p class="content">
										$<?php echo $lugar[5]?> Dolares
									</p>
									
									<a href="comprar_entrada.php?mid=<?php echo $lugar_id?>" class="button is-primary">Comprar Entrada</a>
									
								<?php }?>
							</div>
							<div class="column is-8-desktop is-9-widescreen">
								<p class="heading">
									<strong>Obras que se encuentran aqui</strong>
								</p>
								<table class="table is-bordered is-fullwidth">
									<thead>
									<tr>
										<th class="is-narrow">Foto</th>
										<th>Nombre</th>
										<th class="">Fecha Inicio</th>
										<th class="">Fecha Fin</th>
										<th class="">Periodo</th>
									</tr>
									</thead>
									<tfoot>
									<tr>
										<th colspan="5" class="has-text-right">Total de Obras: <?php echo count($obras) ?></th>
									</tr>
									</tfoot>
									<tbody>
									<?php foreach ($obras as $o) { ?>
										<tr>
											<td>
												<img src="<?php echo $o[5] ?>" width="40" alt="Foto de<?php echo $o[1] ?>">
											</td>
											<td>
												<a href="obra.php?obra_id=<?php echo $o[0] ?>&tipo=<?php echo $o[6]?>">
													<strong>
														<?php echo $o[1] ?>
													</strong>
												</a>
											</td>
											<td>
												<?php echo $o[2] ?>
											</td>
											<td>
												<?php echo $o[3] ?>
											</td>
											<td>
												<?php echo $o[4] ?>
											</td>
										</tr>
									<?php } ?>
									</tbody>
								</table>
								<p class="heading">
									<strong>Artistas que se encuentran aqui</strong>
								</p>
								<table class="table is-bordered is-fullwidth">
									<thead>
									<tr>
										<th class="is-narrow">Foto</th>
										<th>Nombre</th>
									</tr>
									</thead>
									<tfoot>
									<tr>
										<th colspan="5" class="has-text-right">Total de Artistas: <?php echo count($artistas) ?></th>
									</tr>
									</tfoot>
									<tbody>
									<?php foreach ($artistas as $a) { ?>
										<tr>
											<td>
												<img src="<?php echo $a[2] ?>" width="40" alt="Foto de<?php echo $a[1] ?>">
											</td>
											<td>
												<a href="artista.php?artista_id=<?php echo $a[0] ?>">
													<strong>
														<?php echo $a[1] ?>
													</strong>
												</a>
											</td>
										</tr>
									<?php } ?>
									</tbody>
								</table>
							</div>

					</form>
				</div>
			</main>
		</div>
	</section>


<?php include "../templates/main_footer.html"; ?>