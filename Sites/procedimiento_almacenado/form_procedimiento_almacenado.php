<?php include('../templates/main_header.html');
	session_start();
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
							Crear Itinerario
						</h1>
						<h2 class="subtitle">
							Aquí puedes crear tu propio itinerario!!
						</h2>
					</div>
				</div>
				<div class="section">
					<div class="columns">
						<div class="column is-4 is-offset-4">
							<form action="procedimiento_almacenado.php" method="POST" class="box">

								<!--CheckBox para nombre de artistas-->
								<div class="field">


									<label for="nombre_artistas" class="label">Artistas:</label>
									<?php
										
										require("../config/conexion.php");
										
										#Se construye la consulta como un string
										$query = "SELECT DISTINCT nombre FROM artistas;";
										
										#Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
										$result = $db_par->prepare($query);
										$result->execute();
										$rows = $result->fetchAll();
										foreach ($rows as $key => $value) {
											echo '
            <div class="label-container">
                <input type="checkbox" id="' . $value['nombre'] . '" value="' . $value['nombre'] . '" name="' . $value['nombre'] . '">
                <label for="' . $value['nombre'] . '">  ' . $value['nombre'] . '
                </label><br>
            </div>
            ';
										}
									
									?>
								</div>
								<div class="field">
									<!--Datalist para la ciudad de origen-->
									<label for="ciudad_origen" class="label">Ciudad de Origen:</label>
									<input list="ciudades" name="ciudad_origen" class="input is-primary">
									<datalist id="ciudades">
										<?php
											
											require("../config/conexion.php");
											$query = "SELECT DISTINCT nombre FROM ciudades;";
											
											#Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
											$result = $db_par->prepare($query);
											$result->execute();
											$rows = $result->fetchAll();
											foreach ($rows as $key => $value) {
												echo '
            <option value=" ' . $value['nombre'] . ' ">
            ';
											}
										?>
									</datalist>
								</div>

								<!--Date para la fecha de inicio-->
								<div class="field">
									<label for="fecha" class="label">Fecha:</label>
									<input type="date" id="fecha" name="fecha" class="input is-primary">
								</div>

								<!--Sumbit boton envia a procedimiento_almacenado.php -->
								<div class="field">
									<input type="submit" value="Buscar" class="button is-success">
								</div>


							</form>
						</div>
					</div>
				</div>
			</main>
		</div>
	</section>

	<!-- ======= Footer ======= -->
<?php include('../templates/main_footer.html') ?>