<?php
	include('session.php');
	include "../templates/main_header.html";
	$login_session = intval($login_session);
	$uid = $_SESSION["uid"];
	#url de la api
	$url = 'https://gorgeous-wind-cave-51826.herokuapp.com/';
	# se realiza el GET
	$body_r = file_get_contents($url . 'users/' . $uid);
	$body=  json_decode($body_r);
	$fecha1 = "2017-05-08";
	$fecha2 = "2018-05-08";
	
?>
<head>
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
	integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
	crossorigin=""/>
	<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
	integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
	crossorigin=""></script>
</head>
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
								<a class="is-active">
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
						<h1 class="title">
							Hola, <?php echo $_SESSION["user"]; ?>
						</h1>
						<h2 class="subtitle">
							Aquí puedes ver tus mensajes enviados
						</h2>
					</div>
				</div>
				<div class="section">

					<div class="columns is-centered">

              <?php
              if ($body_r == 'Invalid ID, no user with Id = ' . $uid) {
                # Caso donde no hay msjes con ese id
                ?><h1 class="title is-4">
                  No hay mensajes
                </h1>
              <?php } else { ?>
								<style>
									#mapid {height: 400px; width: 480px;}
								</style>
								<div id="mapid"></div>
									<script>
										var lat = parseInt(<?php echo $body[2][0] -> lat; ?>)
										var long = parseInt(<?php echo $body[2][0] -> long; ?>)
										var map = L.map('mapid').setView([lat, long], 14);
										L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
											attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
											maxZoom: 18,
											id: 'mapbox/streets-v11',
											tileSize: 512,
											zoomOffset: -1,
											accessToken: 'pk.eyJ1IjoidnB1bWFyaW5vIiwiYSI6ImNrY2NxdGMwYjA3OGQydXFreWlzc3Uyem4ifQ.-ZBct37uVJ02LkhAs8QOyg'
										}).addTo(map);
									</script>	
									<?php foreach ($body[2] as $mensaje) { 
										if ($fecha1 < $mensaje -> date and $mensaje -> date < $fecha2 ){?>
									<script>
											var lat = parseInt(<?php echo $mensaje -> lat; ?>)
											var long = parseInt(<?php echo $mensaje -> long; ?>)
											L.marker([lat, long]).addTo(map);
									</script>
										<?php }}
									 }?>

					</div>
					<div class="content has-text-centered">
						<a href="main.php" class="button is-link">Volver</a>
					</div>
				</div>
			</main>
		</div>
	</section>
<?php include "../templates/main_footer.html"; ?>