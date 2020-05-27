<?php include "../templates/main_header.html";
	include('../config/conexion.php');
	session_start();
	$query = "SELECT * FROM lugares;";
	$result = $db_par -> prepare($query);
	$result -> execute();
	$lugares = $result -> fetchAll();
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
						<a href="artistas.php">
                        <span class="icon">
                            <i class="fa fa-paint-brush"></i>
                        </span>
							Artistas
						</a>
					</li>
					<li>
						<a href="obras.php" >
                        <span class="icon">
                            <i class="fa fa-image"></i>
                        </span>
							Obras
						</a>
					</li>
					<li>
						<a class="is-active" >
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
			<h1 class="title">Artistas</h1>
			<div class="columns is-multiline">
				<?php foreach ($lugares as $a) { ?>
					<div class="column is-12-tablet is-6-desktop is-4-widescreen">
						<article class="box">
							<div class="media">
								<aside class="media-left">
									<img src="<?php echo '#'?>" width="80" alt="">
								</aside>
								<div class="media-content">
									<p class="title is-5 is-marginless">
										<a href="artista.php?artista_id=<?php echo $a[0] ?>"><?php echo $a[1]?></a>
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
				<?php  }?>
			</div>
		</main>
	</div>
</section>


<?php include "../templates/main_footer.html"; ?>