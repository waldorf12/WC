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
date_default_timezone_set('America/Chihuahua');
	$hoy = date("Y/m/d");
	$hora = date("H:i");


	$hora = substr( $hora, 0, 2);
	$hora = $hora.':00';

	$hora2 = $hora+1;
	$hora2 = $hora2.':00';

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
		<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.css" />
		<link rel="stylesheet" href="assets/css/main.css" />







		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/moment.js"></script>
		<script src="assets/js/transition.js"></script>
		<script src="assets/js/collapse.js"></script>
		<script src="assets/js/bootstrap.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>






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
				<div class="container " id="main">
					<div class="">
						<h2>Votos por fecha</h2>
						<p></p>
						<section class="12u 12u(narrower)">
							<form method="post" action="indicadores.php">
								<div class="row 100%">
									<div class="6u 12u(mobile)">
										<div class="">
											<div class=''>
												<label for="FechaInicial">Fecha Inicial</label>
												<input type='text' name="FechaInicial" class="" id='datetimepicker1' value="<?php echo $hoy; ?> <?php echo $hora; ?>" />
											</div>
										</div>
									</div>
									<div class="6u 12u(mobile)">
										<div class="">
											<div class=''>
												<label for="FechaInicial">Fecha Final</label>
												<input type='text' name="FechaFinal" class=""  value="<?php echo $hoy; ?> <?php echo $hora2; ?> " id='datetimepicker2'  />

											</div>
										</div>
									</div>
								</div>

								<div class="row 50%">
									<div class="12u">
										<ul class="actions">
											<li><input type="submit" value="Buscar" /></li>
											<li><input type="reset" value="Reiniciar" onclick='window.location ="indicadores.php";' /></li>

											<li>
												<div class="checkbox">
													<label>
      <input type="checkbox" style="position: inherit;" name="ConHora"> Buscar Con Hora
			<input type="text" name="AuxBanderaBusqueda" value="1" style="display:none;">
    </label>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</form>
						</section>
			<?php
					if (isset($_POST['AuxBanderaBusqueda']))
					{  //Si existe una consulta
							if ($_POST['AuxBanderaBusqueda'] == 1)
							{


								date_default_timezone_set('America/Chihuahua');
									$hoy = date("Y/m/d");
									$hora = date("H:i");



								  $link = @mysql_connect("localhost", "root","sr1920la")
								      or die ("Error al conectar a la base de datos.");
								  @mysql_select_db("Encuesta", $link)
								      or die ("Error al conectar a la base de datos.");



								$FechaInicial = $_POST['FechaInicial'];
								$FechaFinal = $_POST['FechaFinal'];
								if  (isset($_POST['ConHora']))
								{
								  $ConHora = $_POST['ConHora'];
								}
								else {
								  $ConHora = 'OFF';
								}



								// echo $FechaInicial;
								// echo " | ";
								// echo $FechaFinal;
								// echo " | ";
								// echo $ConHora;
								// echo " | ";


								if ($ConHora =='OFF' )

								{
								   $FechaInicial = substr( $FechaInicial, 0, -6);
								   $FechaFinal = substr( $FechaFinal, 0, -6);
								  $query = 'SELECT  b.Descripcion As "Edificio", d.Descipcion As "Genero", c.Descripcion As "Ubicacion", e.IdEstatus,e.Descripcion AS "Estatus" , a.FechaRegistro As "Fecha", a.HoraRegistro As "Hora" FROM movcregistrovotos a INNER JOIN catcedificios b on a.IdEdificio = b.IdEdificio inner join catcubicaciones c on a.IdUbicacion = c.IdUbicacion inner join catcgenero d on a.IdGenero = d.IdGenero inner join catcestatus e on a.IdEstatus = e.IdEstatus  WHERE a.FechaRegistro BETWEEN "'.$FechaInicial.'" AND "'.$FechaFinal.'"  ORDER BY 1,4 ';

								// echo $query;
								echo '	<table class="table table-striped">
								<thead>
									<tr>
										<th>Edificio</th>
										<th>Genero</th>
										<th>Ubicación</th>
										 <th>Estatus</th>
										<th>Fecha</th>
										<th>Hora</th>

									</tr>
								</thead>
								<tbody>';

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
														<td>'.$row["Hora"].'</td>

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
														<td>'.$row["Hora"].'</td>

												</tr>
												';
											}else
											{
												echo '
												<tr>
													<th scope="row" >'.$row["Edificio"].'</th>
													<td>'.  $row["Genero"] .'</td>
													<td>'.  $row["Ubicacion"].'</td>
													<td>'.$row["Estatus"].'</td>
													 <td>'.$row["Fecha"].'</td>
														<td>'.$row["Hora"].'</td>

												</tr>
												';
											}

										}

										mysql_free_result($result);
										mysql_close($link);

									echo " </tbody>
																	</table>";

								}
								else if ($ConHora == 'on')
								 {

										// $FechaInicial2 = substr( $FechaInicial, 0, -6);
										// $FechaFinal2 = substr( $FechaFinal, 0, -6);
										//
										// $HoraInicial = substr( $FechaInicial, 11, 6);
										// $HoraFinal = substr( $FechaFinal,11 , 6);
										//
										// $HoraInicial = $HoraInicial.':00';
										// $HoraFinal = $HoraFinal.':00';

										$query = 'SELECT b.Descripcion As "Edificio", d.Descipcion As "Genero", c.Descripcion As "Ubicacion",e.IdEstatus, e.Descripcion AS "Estatus" , a.FechaRegistro As "Fecha", a.HoraRegistro As "Hora" FROM movcregistrovotos a INNER JOIN catcedificios b on a.IdEdificio = b.IdEdificio inner join catcubicaciones c on a.IdUbicacion = c.IdUbicacion inner join catcgenero d on a.IdGenero = d.IdGenero inner join catcestatus e on a.IdEstatus = e.IdEstatus WHERE a.FechaHora BETWEEN "'.$FechaInicial.'" AND "'.$FechaFinal.'"   ORDER BY 1,5';

										// echo   $query;

										echo '	<table class="table table-striped">
								    <thead>
								      <tr>
								        <th>Edificio</th>
								        <th>Genero</th>
								        <th>Ubicación</th>
												 <th>Estatus</th>
											  <th>Fecha</th>
												<th>Hora</th>

								      </tr>
								    </thead>
								    <tbody>';

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
 															<td style="color:green;">'.$row["Estatus"].'</td>
 															 <td>'.$row["Fecha"].'</td>
 																<td>'.$row["Hora"].'</td>

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
 															<td style="color:red ">'.$row["Estatus"].'</td>
 															 <td>'.$row["Fecha"].'</td>
 																<td>'.$row["Hora"].'</td>

 														</tr>
 														';
													}else
													{
														echo '
														<tr>
															<th scope="row" >'.$row["Edificio"].'</th>
															<td>'.  $row["Genero"] .'</td>
															<td>'.  $row["Ubicacion"].'</td>
															<td>'.$row["Estatus"].'</td>
															 <td>'.$row["Fecha"].'</td>
																<td>'.$row["Hora"].'</td>

														</tr>
														';
													}

												}

												mysql_free_result($result);
												mysql_close($link);

											echo " </tbody>
											                </table>";


								}






							} // si la variable es = a 1

					}

			 ?>




					</div>





				</div>
			</div>



			<div id="footer-wrapper">
				<div id="footer" class="container">
					<header class="major">
						<h2>Estadísticas Selectivas</h2>
						<p>Sección donde podemos encontrar indicadores más específicos .</p>
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
									<li class=></li>
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

	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/moment.js"></script>
	<script src="assets/js/transition.js"></script>
	<script src="assets/js/collapse.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

	<script type="text/javascript">
		$(function() {



			$('#datetimepicker1').datetimepicker({


				format: 'YYYY/MM/DD HH:mm'
			});



			$('#datetimepicker2').datetimepicker({


				format: 'YYYY/MM/DD HH:mm'
			});

			$('#datetimepicker3').datetimepicker({


				format: 'YYYY/MM/DD HH:mm'
			});

			$('#datetimepicker4').datetimepicker({


				format: 'YYYY/MM/DD HH:mm'
			});

		});
	</script>
