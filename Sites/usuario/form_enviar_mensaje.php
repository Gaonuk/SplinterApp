<?php
	session_start();
	include('../templates/main_header.html');
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
							Sección enviar mensajes
						</h1>
						<h2 class="subtitle">
							Enviar mensaje
						</h2>
					</div>
				</div>
				<div class="section">
					<div class="columns">
						<div class="column is-4 is-offset-4">
							<form action="enviar_mensaje.php" method="POST" class="box">
                                <!-- Username -->
                                <label class="label">Ingrese el username del usuario</label>
                                <input type='text' id='username' name='username'><br>
								<br>
                                <!-- mensaje -->
                                <label class="label">Mensaje a enviar</label>
                                <input type='text' id='mensaje' name='mensaje'><br>
								<br>
                                <!-- mensaje -->
                                <!-- Boton -->
                                <div class="field">
									<input type="submit" value="Enviar" class="button is-success"><b>
								<div class="content has-text-centered">
                            		<a href="main.php" class="button is-link">Volver</a>
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