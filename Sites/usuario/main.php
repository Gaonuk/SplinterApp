<?php include "../templates/main_header.html"; ?>
<nav class="navbar has-shadow">
  <div class="navbar-brand">
    <a class="navbar-item">
      <img src="https://bulma.io/images/bulma-type-white.png" alt="Logo">
    </a>
  </div>
  <div class="navbar-menu">
    <div class="navbar-start">
      <div class="navbar-item">
        <small>Aplicacion web de los grupos 84 y 15</small>
      </div>
    </div>
  </div>
  <div class="navbar-menu is-danger">
    <div class="navbar-end">
      <div class="navbar-item has-dropdown is-hoverable" style="background-color: #363636">
        <div class="navbar-link" style="background-color: #363636">
					<?php $_SESSION["user"] ?>
        </div>
        <div class="navbar-dropdown" style="background-color: #363636">
          <a class="navbar-item" href="">
            <div>
                                <span class="icon is-small">
                                  <i class="fa fa-user-circle-o"></i>
                                </span>
              Profile
            </div>
          </a>
          <a class="navbar-item" href="">
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
<div class="hero-body">
  <aside class="menu " style="background-color: #363636">
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
        <a style="background-color: #363636">
                        <span class="icon">
                            <i class="fa fa-paint-brush"></i>
                        </span>
          Artistas
        </a>
      </li>
      <li>
        <a href="" style="background-color: #363636">
                        <span class="icon">
                            <i class="fa fa-image"></i>
                        </span>
          Obras
        </a>
      </li>
      <li>
        <a href="" style="background-color: #363636">
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
    <ul class="menu-list" style="background-color: #363636;">
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
    <ul class="menu-list" style="background-color: #363636;">
      <li>
				<a href="nuevo_ticket">
					<span class="icon">
						<i class="fas fa-ticket-alt"></i>
					</span>
					Comprar Tickets
				</a>
      </li>
    </ul>
  </aside>
  <div class="container has-text-centered">
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
  <!-- The right part, specific to each page -->
  <!--<h1 class="title"> Bienvenido, --><?php //$_SESSION["user"] ?><!--</h1>-->


</div>

<?php include "../templates/main_footer.html"; ?>