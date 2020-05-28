<?php include "../templates/main_header.html";
	include('../config/conexion.php');
	session_start();
	$query = "SELECT * FROM lugares;";
	$result = $db_par->prepare($query);
	$result->execute();
	$lugares = $result->fetchAll();
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
					<a class="navbar-item" href="">
						<div>
                                <span class="icon is-small">
                                  <i class="fa fa-user-circle-o"></i>
                                </span>
							Profile
						</div>
					</a>
					<a class="navbar-item" href="logout.php">
						<div>
                                <span class="icon is-small">
                                  <i class="fa fa-sign-out"></i>
                                </span>
							Sign Out
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
								<a class="is-active">
													<span class="icon">
															<i class="fa fa-tachometer"></i>
													</span>
									Dashboard
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
								<a>
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
						<h1 class="title">Lugares</h1>
					</div>
				</div>
				<div class="section">
					<div class="columns is-multiline">
						<?php foreach ($lugares as $a) { ?>
							<div class="column is-12-tablet is-6-desktop is-4-widescreen">
								<article class="box">
									<div class="media">
										<aside class="media-left">
											<img src="<?php echo '#' ?>" width="80" alt="">
										</aside>
										<div class="media-content">
											<p class="title is-5 is-marginless">
												<a href="artista.php?artista_id=<?php echo $a[0] ?>"><?php echo $a[1] ?></a>
											</p>
											<p class="subtitle is-marginless">
												<!--										--><?php //echo $a[2]?>
												<br>
												<!--										--><?php //echo $a[3]?>
											</p>
											<div class="content is-small">
												<!--										--><?php //echo $a[4]?>
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