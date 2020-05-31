<?php
	include('session.php');
	include "../templates/main_header.html"; ?>
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
					Aquí puedes reservar una habitación en los hoteles
				</h2>
			</div>
		</div>
		<div class="section">
			<div class="columns">
				<div class="column is-4 is-offset-4">
					<form action="busca_hotel.php" method="post" class="box">
						<label class="label">Fecha Inicio</label>
						<div class="field">
							<div class="control has-icons-left">
								<input type="date" name="fecha_inicio" class="input" placeholder="Fecha Llegada">
								<span class="icon is-medium is-left">
									<i class="fas fa-calendar"></i>
								</span>
							</div>
						</div>
						<div class="field">
							<label class="label">Fecha Fin</label>
							<div class="field">
								<div class="control has-icons-left">
									<input type="date" name="fecha_fin" class="input" placeholder="Fecha Salida">
									<span class="icon is-medium is-left">
										<i class="fas fa-calendar"></i>
									</span>
								</div>
							</div>
							<div class="field">
								<label class="label">Ciudad</label>
								<div class="control has-icons-left">
									<div class="select">
										<select name="ciudad">
											<option value="">Ciudad</option>
											<?php
												$query = "SELECT cid, nombreciudad from ciudades;";
												$result = $db_impar->prepare($query);
												$result->execute();
												$ciudades = $result->fetchAll();
												foreach ($ciudades as $c) {
													?>
													<option value="<?php echo $c[0]; ?>">
														<?php echo $c[1]; ?>
													</option>
													<?php
												}
											?>
										</select>
									</div>
									<div class="icon is-small is-left">
										<i class="fas fa-city"></i>
									</div>
								</div>
							</div>
							<br>
							<div class="control">
								<input type="submit" value="Buscar" class="button is-primary">
							</div>
					</form>
				</div>
			</div>
		</div>
	</main>
<?php include "../templates/main_footer.html"; ?>