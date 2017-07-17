<?php



session_start();


	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

	} else {
	      header('Location: Error.php');
          session_destroy();

	exit;
	}
	$now = time();
  $expiracion = 0;
  $expiracion = $_SESSION['expire'];

  // echo "$now";
  // echo "<br>";
  // echo "$expiracion";

	if($now > $_SESSION['expire']) {
	session_destroy();

     header('Location: TiempoAgotado.html');
       session_destroy();
	exit;
	}

include 'header.php';

	?>

<!DOCTYPE HTML>

<html lang="es">
	<head>
		<title>PLATAFORMA ESTRATEGICA DE SEGUIMIENTO SANITARIO</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->

		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="assets/css/bootstrap.css">

<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap.min.js" ></script>
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body class="left-sidebar">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<div id="header" class="container">

						<!-- Logo -->
							<h1 id="logo"><a href="PanelControl.php">UACH - FING </a></h1>

						<!-- Nav -->
						<nav id="nav">
							<?php echo $Header; ?>
						</nav>

					</div>
				</div>

			<!-- Main -->
				<div class="wrapper">
					<div class="container" id="main">
						<div class="">
						<h2>Todos los Votos.</h2>
						<p></p>

							<table class="table table-striped">
				    <thead>
				      <tr>
				        <th>Edificio</th>
				        <th>Género</th>
				        <th>Ubicación</th>
								 <th>Estatus</th>
							  <th>Fecha</th>
				      </tr>
				    </thead>
				    <tbody>
							<?php
								$link = @mysql_connect("localhost", "root","sr1920la")
										or die ("Error al conectar a la base de datos Error en la contraseña o algo.");
								@mysql_select_db("Encuesta", $link)
										or die ("Error al conectar a la base de datos Error al conectrase con la base de datos.");



$query = 'SELECT b.Descripcion As "Edificio", d.Descipcion As "Genero", c.Descripcion As "Ubicacion", e.Descripcion AS "Estatus" , a.FechaHora  AS "Fecha" FROM movcregistrovotos a INNER JOIN catcedificios b on a.IdEdificio = b.IdEdificio inner join catcubicaciones c on a.IdUbicacion = c.IdUbicacion inner join catcgenero d on a.IdGenero = d.IdGenero inner join catcestatus e on a.IdEstatus = e.IdEstatus  ORDER BY 5 DESC ';

								$result = mysql_query($query);

								while($row = mysql_fetch_array($result))
								{

									if ($row["Estatus"] == 'FELIZ')
									 {
										 echo '
										<tr>
											<th scope="row" >'.$row["Edificio"].'</th>
											<td>'.  $row["Genero"] .'</td>
											<td>'.  $row["Ubicacion"].'</td>
											<td ><b style="color:green;">'.$row["Estatus"].'</b></td>
											 <td>'.$row["Fecha"].'</td>

										</tr>
										';
									}
									elseif ($row["Estatus"] == 'TRISTE')
									 {
										 echo '
										<tr>
											<th scope="row" >'.$row["Edificio"].'</th>
											<td>'.  $row["Genero"] .'</td>
											<td>'.  $row["Ubicacion"].'</td>
											<td ><b style="color:red;">'.$row["Estatus"].'</b></td>
												<td>'.$row["Fecha"].'</td>

										</tr>
										';
									}else
									{
										echo '
										<tr>
											<th scope="row" >'.$row["Edificio"].'</th>
											<td>'.  $row["Genero"] .'</td>
											<td>'.  $row["Ubicacion"].'</td>
											<td><b>'.$row["Estatus"].'</b></td>
											 <td>'.$row["Fecha"].'</td>

										</tr>
										';
									}




								}


								mysql_free_result($result);
								mysql_close($link);
							?>

				    </tbody>
				  </table>

						</div>

					</div>
				</div>



				<div id="footer-wrapper">
					<div id="footer" class="container">
						<header class="major">
							<h2>Estadísticas Selectivas</h2>
							<p>Seccion donde podemos encontrar indicadores más especificos .</p>
						</header>
						<div class="row">

							<section class="12u 12u(narrower)">
								<div class="row 0%">
									<ul class="divided icons 6u 12u(mobile)">
										<li class="icon fa-check"><a href="UbicacionesPositivas.php"><span class="extra">Ubicaciones Votadas Positivamente</a></li>
											<li class="icon fa-minus"><a href="UbicacionesNeutrales.php"><span class="extra">Ubicaciones Votadas Neutralmente</a></li>

										<li class="icon fa-close"><a href="UbicacionesNegativas.php"><span class="extra">Ubicaciones Votadas Negativamente</a></li>
									</ul>
									<ul class="divided icons 6u 12u(mobile)">
										<li class="icon fa-line-chart"><a href="TodosVotos.php"><span class="extra">Todos los Votos</a></li>
										<li class="icon fa-pie-chart"><a href="Visuales.php"><span class="extra">Indicadores Visuales</a></li>
										<li class=""></li>
									</ul>
								</div>
							</section>
						</div>
					</div>

					<div id="copyright" class="container">
						<ul class="menu">
							<p class="copyright">&copy; Copyright. Design: Secretaría Administrativa - Facultad de Ingeniería </p>
						</ul>
					</div>
				</div>

		</div>

		<!-- Scripts -->

			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>
