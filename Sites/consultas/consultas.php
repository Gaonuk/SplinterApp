<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>Grupo84 Web App - Index</title>
	<meta content="" name="descriptison">
	<meta content="" name="keywords">
	<!-- Favicons -->
	<link href="../assets/img/puc-svg.png" rel="icon">
	<!-- Vendor CSS Files -->
	<link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
	<link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">
	<link href="../assets/vendor/owl.carousel/../assets/owl.carousel.min.css" rel="stylesheet">
	<link href="../assets/vendor/aos/aos.css" rel="stylesheet">
	<!-- Template Main CSS File -->
	<link href="../assets/css/style.css" rel="stylesheet">
	<!-- Table Styling Files -->
	<link rel="icon" type="image/png" href="../assets/images/icons/favicon.ico"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/vendor/perfect-scrollbar/perfect-scrollbar.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/main.css">

</head>
<body>
<!-- ======= Hero Section ======= -->
<section id="hero">
	<div class="hero-container">
		<a href="index.html" class="hero-logo" data-aos="zoom-in"><img src="../assets/img/puc-svg.png" alt="Logo Pontificia Universidad Catolica"></a>
		<h1 data-aos="zoom-in">Bienvenido a la applicacion web para hacer consultas SQL</h1>
		<h2 data-aos="fade-up">Somos el grupo84</h2>
		<a data-aos="fade-up" href="#services" class="btn-get-started scrollto">Empezar</a>
	</div>
</section>
<!-- End Hero -->
<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
	<div class="container">
		<!-- The main logo is shown in mobile version only. The centered nav-logo in nav menu is displayed in desktop view  -->
		<div class="logo d-block d-lg-none">
			<a href="index.html"><img src="../assets/img/puc-svg.png" alt="" class="img-fluid"></a>
		</div>
		<nav class="nav-menu d-none d-lg-block">
			<ul class="nav-inner">
				<li class="nav-logo"><a href="index.html"><img src="../assets/img/puc-logo.png" alt="" class="img-fluid"></a></li>
			</ul>
		</nav><!-- .nav-menu -->
	</div>
</header><!-- End Header -->
<main id="main">
	<!-- ======= Services Section ======= -->
	<section id="services" class="services">
		<div class="container">
			<div class="section-title" data-aos="fade-up">
				<h2>Consultas</h2>
				<p>Aqui se encuentran las consultas del grupo par para la E2</p>
			</div>
			<div class="row">
				<div class="col-lg-6 order-2 order-lg-1">
					<div class="icon-box mt-5 mt-lg-0" data-aos="fade-left">
						<i class="bx bx-receipt"></i>
						<h4>Consulta 3</h4>
						<p>Ingrese el nombre de un pais. Muestra el nombre de todos los museos de ese pais que tengan obras del renacimiento</p>
						<form action="consulta_3.php" method="POST">
							<p><input type="text" name="pais" placeholder="Nombre Pais"></p>
							<p><input type="submit" value="Buscar" class="boton-busqueda"></p>
						</form>
					
					</div>
					<div class="icon-box mt-5" data-aos="fade-left" data-aos-delay="100">
						<i class="bx bx-receipt"></i>
						<h4>Consulta 5</h4>
						<p>Ingrese una hora de apertura en formato <strong>hh:mm:ss</strong>, una hora de cierre y una ciudad. Muestre los nombres de las iglesias ubicadas en esa ciudad, abiertas entre esas horas (inclusive) junto a todos los nombres de los frescos que se encuentran en cada una de ellas. Una fila por cada tupla</p>
						<form action="consulta_5.php" method="POST">
							<p><input type="text" name="apertura" placeholder="Hora Apertura"> </p>
							<p><input type="text" name="cierre" placeholder="Hora Cierre"> </p>
							<p><input type="text" name="ciudad" placeholder="Nombre Ciudad"> </p>
							<p><input type="submit" value="Buscar" class="boton-busqueda"></p>
						</form>
					
					</div>
				</div>
				<div class="col-lg-6 mt-4 mt-lg-0" data-aos="fade-right">
					<ul class="nav nav-tabs flex-column">
						<li class="nav-item">
							<a class="nav-link" href="consulta_1.php">
								<h4>Consulta 1: Nombres Obras!</h4>
								<p>Muestra todos los nombres distintos de las obras de arte.</p>
							</a>
						</li>
						<li class="nav-item mt-2">
							<a class="nav-link" href="consulta_2.php">
								<h4>Consulta 2: <em>Gian Lorenzo Bernini</em></h4>
								<p>Muestra todos los nombres de plazas que contengan al menos una escultura de <em>Gian Lorenzo Bernini</em>.</p>
							</a>
						</li>
						<li class="nav-item mt-2">
							<a class="nav-link" href="consulta_4.php">
								<h4>Consulta 4: Artistas</h4>
								<p>Para cada artista, entrega su nombre y el numero de obras en las que ha participado.</p>
							</a>
						</li>
						<li class="nav-item mt-2">
							<a class="nav-link" href="consulta_6.php">
								<h4>Consulta 6: Lugares</h4>
								<p>Encuentra el nombre de cada museo, plaza o iglesia que tenga obras de todos los periodos del arte que existan en la base de datos</p>
							</a>
						</li>
					</ul>
				</div>
			
			</div>
		</div>
	</section><!-- End Services Section -->
	<br>
	<br>
	<br>
	<br>
	<br>
</main><!-- End #main -->
<!-- ======= Footer ======= -->
<footer id="footer">
	<div class="footer-top">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6">
					<a href="#header" class="scrollto footer-logo"><img src="../assets/img/puc-svg.png" alt=""></a>
					<h3>Grupo84</h3>
					<p>Ojala les haya gustado nuestra pagina web!</p>
				</div>
			</div>
		</div>
	</div>
</footer><!-- End Footer -->
<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
<!-- Vendor JS Files -->
<script src="../assets/vendor/jquery/jquery.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="../assets/vendor/php-email-form/validate.js"></script>
<script src="../assets/vendor/jquery-sticky/jquery.sticky.js"></script>
<script src="../assets/vendor/venobox/venobox.min.js"></script>
<script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="../assets/vendor/aos/aos.js"></script>
<!-- Table Styling Files -->
<script src="../assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="../assets/vendor/bootstrap/js/popper.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="../assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="../assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script>
    $('.js-pscroll').each(function(){
        var ps = new PerfectScrollbar(this);

        $(window).on('resize', function(){
            ps.update();
        })
    });


</script>
<!-- Template Main JS File -->
<script src="../assets/js/main.js"></script>
</body>
</html>