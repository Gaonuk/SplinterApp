<?php include('templates/main_header.html'); ?>
</nav>
<section class="section">
	<div class="columns is-centered">
		<div class="column is-5-tablet is-4-widescreen is-4-desktop" data-aos="fade-up">
			<h3 class="title"> Iniciar Sesión</h3>
			<form action="usuario/login.php" method="post" class="box">
				<div class="label">
					<label class="label">Username</label>
					<div class="control has-icons-left">
						<input type="text" name="username" class="input is-primary">
						<span class="icon is-small is-left">
                        <i class="fa fa-user"></i>
                    </span>
					</div>
				</div>
				<div class="field">
					<label class="label">Password</label>
					<div class="control has-icons-left">
						<input type="password" name="password" class="input is-primary">
						<span class="icon is-small is-left">
                        <i class="fa fa-lock"></i>
                    </span>
					</div>
				</div>
				<input type="submit" value="Conectarse" class="button is-success">
			</form>
		</div>
		<div class="column is-5-tablet is-4-widescreen is-4-desktop">
			<h3 class="title">Nuevo Usuario</h3>
			<form action="usuario/new.php" method="post" class="box">
				<div class="label">
					<label class="label">Username</label>
					<div class="control has-icons-left">
						<input type="text" name="username" class="input is-primary">
						<span class="icon is-small is-left">
                        <i class="fa fa-user"></i>
                    </span>
					</div>
				</div>

				<div class="field">
					<label class="label">Email</label>
					<div class="control has-icons-left">
						<input type="text" name="email" class="input is-primary">
						<span class="icon is-small is-left">
                        <i class="fa fa-envelope"></i>
                    </span>
					</div>
				</div>
				<div class="field">
					<label class="label">Nombre Completo</label>
					<div class="control has-icons-left">
						<input type="text" name="nombre" class="input is-primary">
						<span class="icon is-small is-left">
                        <i class="fa fa-signature"></i>
                    </span>
					</div>
				</div>
				<div class="field">
					<label class="label">Dirección</label>
					<div class="control has-icons-left">
						<input type="text" name="direccion" class="input is-primary">
						<span class="icon is-small is-left">
                        <i class="fas fa-map-marker-alt"></i>
                    </span>
					</div>
				</div>
				<div class="field">
					<label class="label">Password</label>
					<div class="control has-icons-left">
						<input type="password" name="password" class="input is-primary">
						<span class="icon is-small is-left">
                        <i class="fa fa-lock"></i>
                    </span>
					</div>
				</div>
				<input type="submit" value="Crear Nuevo Usuario" class="button is-success">
			</form>
		</div>

	</div>
</section>
<div class="section">

</div>
<div class="content has-text-centered">
	<div class="columns">
		<div class="column">
			<a href="consultas/consultas.php" class="button is-info">Ver Entrega 2 Par</a>
		</div>
		<div class="column is-1-widescreen">

		</div>
		<div class="column">
			<a href="consultas/consultas_impar/consultas.php" class="button is-info">Ver Entrega 2 Impar</a>

		</div>
	</div>
	
</div>
<?php
	include('templates/main_footer.html');
?>



