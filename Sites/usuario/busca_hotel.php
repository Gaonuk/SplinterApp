<?php
	include('session.php');
	include "../templates/main_header.html";
	$login_session = intval($login_session);
	$fecha_inicio = $_POST["fecha_inicio"];
	$fecha_fin = $_POST["fecha_fin"];
	$ciudad = $_POST["ciudad"];
	
	$query = "SELECT ciudades.nombreciudad, hoteles.nombrehotel,
 hoteles.direccionhotel, hoteles.telefono, hoteles.precionoche, hoteles.hid FROM hoteles, ciudades 
 WHERE hoteles.nombreciudad = ciudades.cid AND hoteles.nombreciudad = '$ciudad' AND '$fecha_fin' >= '$fecha_inicio';";
	$result = $db_impar->prepare($query);
	$result->execute();
	$hoteles = $result->fetchAll();
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
								<a class="is-active">
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
							Reserva Hotel
						</h1>
						<h2 class="subtitle">
							Aqui esta el resultado de tu busqueda!
						</h2>
					</div>
				</div>
				<div class="section">
					<div class="columns">
						<div class="column is-10 is-offset-1">
							<table class="table">
								<thead>
								<tr>
									<th>Ciudad</th>
									<th>Nombre Hotel</th>
									<th>Dirección</th>
									<th>Teléfono Contacto</th>
									<th>Precio por Noche</th>
									<th>Reservar</th>
								</tr>
								</thead>
								<tbody>
								<?php
									foreach ($hoteles as $h) {
										echo "<tr>
    <td>$h[0]</td> 
    <td>$h[1]</td> 
    <td>$h[2]</td> 
    <td>$h[3]</td> 
    <td>$h[4]</td> 
    <td><form action='compra_hotel.php' method='post'>
    <div class='control'>
    <input type='hidden' name='hotel' value=$h[5]>
    <input type='hidden' name='fecha_inicio' value=$fecha_inicio>
    <input type='hidden' name='fecha_fin' value=$fecha_fin>
    <input type='submit' value='Reservar' class='button is-primary'>
    </div>
 </form> </td></tr>";
									}
								?>
								</tbody>
							</table>
							<a href="nuevo_hotel.php" class="button is-link">Volver</a>
						</div>
					</div>
				</div>
			</main>
		</div>
	</section>
<?php if ($fecha_fin < $fecha_inicio) {
	echo "La fecha de salida debe ser posterior a la fecha de entrada"; ?>
	<h2><a href="main.php">Volver a intentar</a></h2>
<?php } ?>
<?php include "../templates/main_footer.html"; ?>