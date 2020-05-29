<?php include "../templates/main_header.html";
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
						<div>
					<a>
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
								<a class="is-active">
													<span class="icon">
															<i class="fa fa-user-circle-o"></i>
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
						<h1 class="title">Welcome, <strong><?php echo $_SESSION['user'] ?></strong></h1>
					</div>
				</div>
				<div class="section">


					<p class="title">¿Qué deseas hacer? </p>
					<div class="columns is-centered">
						<div class="column">
							<div class="box">
								<p>
															<span class="icon">
																	<i class="fa fa-landmark"></i>
															</span>
									Ver mis entradas a museos
								</p>
								<br>
								<a href="museum_entrance.php" class="button is-success">Ver entradas</a>
							</div>
						</div>
						<div class="column is-5-tablet is-4-widescreen is-4-desktop">
							<div class="box">
								<p>
															<span class="icon">
																	<i class="fas fa-hotel"></i>
															</span>
									Ver mis reservas de hoteles
								</p>
								<br>
								<a href="hotels.php" class="button is-success">Ver reservas</a>
							</div>
						</div>
						<div class="column">
							<div class="box">
								<p>
															<span class="icon">
																	<i class="fas fa-subway"></i>
															</span>
									Ver mis tickets de transporte
								</p>
								<br>
								<a href="tickets.php" class="button is-success">Ver tickets</a>
							</div>
						</div>
					</div>
				</div>
			</main>
		</div>
	</section>


<?php include "../templates/main_footer.html"; ?>