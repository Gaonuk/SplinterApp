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
						<a class="is-active">
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
						<a href="obras.php" >
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
			<h1 class="title"><span class="has-text-grey-light">Bienvenido</span> <strong><?php echo $_SESSION['user'] ?></strong></h1>
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
		</main>
	</div>
</section>


<?php include "../templates/main_footer.html"; ?>
<!--<br>-->
<!--Comprar Tickets-->
<!--<br>-->
<!--  <form align="center" action="compra_tickets.php" method="post">-->
<!--    Fecha Viaje-->
<!--    <br>-->
<!--    <input type="text" name="fecha_viaje">-->
<!--    <br>-->
<!--    Ciudad origen:  -->
<!--      <select Nombre Ciudad='NEW'>  -->
<!--      <option value="">--- Select ---</option>  -->
<!--      --><?php //require("../config/conexion.php");
	//          $select="ciudades";
	//          if (isset ($select)&&$select!=""){
	//          $select=$_POST ['NEW'];
	//      }
	//      ?><!--  -->
<!--      --><? //
	//        $conn = pg_pconnect("dbname=$db_impar");
	//        $result = pg_query($conn, "SELECT cid, nombreciudad from ciudades;");
	//        while($row_list=pg_fetch_array($result)){
	//          ?>
<!--          <option value=--><?php //echo $row_list["cid"]; ?><!---->
<!--          --><?php //echo $row_list["nombreciudad"]; ?><!-- -->
<!--          </option>-->
<!--          --><?php
	//          }
	//          ?>
<!--          </select>-->
<!--          ?>  -->
<!--      <input type="submit" value="Buscar"> -->
<!--  </form>-->
<!--  <br>-->
