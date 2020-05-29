<?php
	include('session.php');
	include "../templates/main_header.html";
	session_start();
	$login_session = intval($login_session);
	$uid = $_SESSION["uid"];
	$query = "SELECT * FROM entradas where uid = $uid;";
	$result = $db_impar->prepare($query);
	$result->execute();
	$entradas = $result->fetchAll();
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
							Aquí puedes ver tus entradas a museos
						</h2>
					</div>
				</div>
				<div class="section">
					
					<div class="columns is-centered">
						<table class="table">
							<thead>
							<tr>
								<th>Fecha Compra</th>
								<th>Museo</th>
							</tr>
							</thead>
							<tfoot>
							<tr>
								<th colspan="5" class="has-text-right">Total de Entradas: <?php echo count($entradas) ?></th>
							</tr>
							</tfoot>
							<tbody>
							<?php
								foreach ($entradas as $e) {
									echo "<tr> <td>$e[0]</td> <td>$e[1]</td></tr>";
								}
							?>
							</tbody>
						</table>
					</div>
					<div class="content has-text-centered">
						<a href="main.php" class="button is-link">Volver</a>
					</div>
				</div>
			</main>
		</div>
	</section>
<?php include "../templates/main_footer.html"; ?>