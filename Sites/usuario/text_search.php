<?php
	include "../usuario/session.php";
	include('../templates/main_header.html'); ?>
<?php
    $desired = $_POST['desired'];
    if (empty($desired)) {
        $desired = array();
    } else {
        $desired = explode(';', $desired);
    };
    $required = $_POST['required'];
    if (empty($required)) {
        $required = array();
    } else {
        $required = explode(';', $required);
    };
    $forbidden = $_POST['forbidden'];
    if (empty($forbidden)) {
        $forbidden = array();
    } else {
        $forbidden = explode(';', $forbidden);
    };
    $uid = $_POST['uid'];
    if (empty($uid)) {
        $uid = array();
    };
    $url = 'https://gorgeous-wind-cave-51826.herokuapp.com/text-search';
    $data = array(
        'desired' => $desired,
        'required' => $required,
        'forbidden' => $forbidden,
        'userId' => $uid
    );
    $options = array(
        'http' => array(
          'method'  => 'GET',
          'content' => json_encode( $data ),
          'header'=>  "Content-Type: application/json\r\n" .
                      "Accept: application/json\r\n"
        )
      );
    $context  = stream_context_create( $options );
    $body_r = file_get_contents( $url, false, $context );
    $body = json_decode( $body_r );
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
							Aquí puedes ver los resultados de la busqueda
						</h2>
					</div>
				</div>
				<div class="section">

					<div class="columns is-centered">
						<table class="table">
							<thead>
							<tr>
								<!-- Se crea la tabla -->
                                <th>Fecha</th>
                                <th>Remitente</th>
                                <th>Destinatario</th>
								<th>Mensaje</th>
							</tr>
							</thead>
							<tbody>
							<?php
							if ($body_r == 'Invalid ID, no user with Id = ' . $uid) {
								# Caso donde no hay msjes con ese id
								echo 'Id de usuario invalido' . $uid;
							} else { ?>
								<?php foreach ($body as $mensaje) { ?>
									<tr>
                                        <td><?php echo $mensaje -> date ?></td>
                                        <td><?php echo $mensaje -> sender ?></td>
										<td><?php echo $mensaje -> receptant ?></td>
										<td><?php echo $mensaje -> message ?></td>
									</tr>
									<?php }
							}?>

							</tbody>
						</table>
					</div>
					<div class="content has-text-centered">
						<a href="form_text_search.php" class="button is-link">Volver</a>
					</div>
				</div>
			</main>
		</div>
	</section>
<?php include "../templates/main_footer.html"; ?>
