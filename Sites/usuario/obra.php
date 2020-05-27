
<?php include "../templates/main_header.html";
	include('../config/conexion.php');
	session_start();
	$obras_id = $_GET['obra_id'];
	$obras_id = intval($obras_id);
	$query = "SELECT * FROM obras WHERE oid=$obras_id;";
	$result = $db_par -> prepare($query);
	$result -> execute();
	$obra = $result -> fetchAll();
	$obra = $obra[0];
	$query2 = "SELECT artistas.aid, artistas.nombre FROM artistas, realizo, obras WHERE artistas.aid = realizo.aid AND obras.oid = realizo.oid and obras.oid = $obras_id;";
	$result2 = $db_par -> prepare($query2);
	$result2 -> execute();
	$artistas = $result2 -> fetchAll();
	$query3 = "select lugares.lid, lugares.nombre from obras, lugares, obras_en where obras_en.lid = lugares.lid and obras_en.oid = obras.oid and obras.oid = $obras_id;";
	$result3 = $db_par -> prepare($query3);
	$result3 -> execute();
	$lugares = $result3 -> fetchAll();
	$lugar = $lugares[0];
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
	
	<section class="section">
		<div class="columns">
			<div class="column is-4-tablet is-3-desktop is-2-widescreen">
				<aside class="menu ">
					<p class="menu-label">
						General
					</p>
					<ul class="menu-list">
						<li>
							<a href="main.php">
                        <span class="icon">
                            <i class="fa fa-tachometer"></i>
                        </span>
								Dashboard
							</a>
						</li>
						<li>
							<a  href="artistas.php">
                        <span class="icon">
                            <i class="fa fa-paint-brush"></i>
                        </span>
								Artistas
							</a>
						</li>
						<li>
							<a class="is-active" >
                        <span class="icon">
                            <i class="fa fa-image"></i>
                        </span>
								Obras
							</a>
						</li>
						<li>
							<a href="lugares.php" >
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
					<ul class="menu-list" >
						<li>
							<a >
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
					<ul class="menu-list" >
						<li>
							<a href="" >
					<span class="icon">
						<i class="fas fa-ticket-alt"></i>
					</span>
								Comprar Tickets
							</a>
						</li>
					</ul>
				</aside>
			</div>
			<main class="column">
				<nav class="breadcrumb " aria-label="breadcrumbs ">
					<ul>
						<li>
							<a href="obras.php">Obras</a>
						</li>
						<li class="is-active">
							<a>Ver Obra</a>
						</li>
					</ul>
				</nav>
				<h1 class="title">
					<span class="has-text-grey-light">Obra</span> <strong><?php echo $obra[1] ?></strong>
				</h1>
				
				<form>
					<div class="columns is-desktop">
						<div class="column is-4-desktop is-3-widescreen">
							<figure class="image">
								<img src="<?php echo $obra[5]?>" width="120" alt="Placeholder image">
							</figure>
							<br>
							<p class="heading">
								<strong>Artistas que realizaron esta obra:</strong>
							</p>
							<ul>
								<?php foreach ($artistas as $a) {?>
									<li><a href="artista.php?artista_id=<?php echo $a[0] ?>"><?php echo $a[1]?></a></li>
								<?php }?>
							</ul>
							<br>
							<p class="heading">
								<strong>Ubicacion de la obra:</strong>
							</p>
							<p class="content">
								<a href="lugar.php?lugar_id=<?php echo $lugar[0]?>"><?php echo $lugar[1]?></a>
							</p>
						</div>
						<div class="column is-4-desktop is-4-widescreen">
							<p class="heading">
								<strong>Fecha de Inicio</strong>
							</p>
							<p class="content">
								<?php echo $obra[2]?>
							</p>
							<p class="heading">
								<strong>Fecha de Fin</strong>
							</p>
							<p class="content">
								<?php echo $obra[3]?>
							</p>
							<p class="heading">
								<strong>Periodo</strong>
							</p>
							<p class="content">
								<?php echo $obra[4] ?>
							</p>
							<p class="heading">
								Link Imagen
							</p>
							<p class="content">
								<a href="<?php echo $obra[5]?>"><?php echo $obra[5]?></a>
							</p>
						</div>
						
				</form>
			</main>
		</div>
	</section>


<?php include "../templates/main_footer.html"; ?>