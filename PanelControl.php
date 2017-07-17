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
		<title>PLATAFORMA ESTRATÉGICA DE SEGUIMIENTO SANITARIO</title>
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

      <div class="wrapper">
          <div class="container" id="main">
            <div class="row 150%">
              <div class="4u 12u(narrower)">

                <!-- Sidebar -->
                  <section id="sidebar">
                    <section>
                      <header>
                        <a href="#" class="image featured"><img src="images/secretaria.png" alt="" /></a>

                        <h3>Edición de Perfil</h3>
                      </header>
                      <p>En esta sección se puede modificar su usuario y contraseña asi como la creación de nuevos usuarios que puedan acceder a la plataforma.</p>
                      <ul class="actions">
                        <li><a href="Perfil.php" class="button">Edición de Perfil</a></li>
                      </ul>
                    </section>
                    <section>
                      <!-- <a href="#" class="image featured"><img src="images/chart.png" alt="" /></a> -->

                      <header>
                        <h3>Indicadores</h3>
                      </header>
                      <p>Sección donde usted podra encontrar información detallada de los votos realizados en las instalaciones sanitarias.</p>
                      <ul class="actions">
                        <li><a href="indicadores.php" class="button">Indicadores</a></li>
                      </ul>
                    </section>
                  </section>

              </div>
              <div class="8u 12u(narrower) important(narrower)">

                <!-- Content -->
                  <article id="content">
                    <header>
                      <h2 ALIGN=center >PLATAFORMA ESTRATÉGICA DE SEGUIMIENTO SANITARIO</h2>
                      <p>Plataforma creada con la finalidad de monitorear y dar seguimiento al estatus de los sanitarios presentes en la facultad.</p>
                    </header>
                    <a href="#" class="image featured"><img src="images/portadaweb.png" alt="" /></a>
                    <p>Limpieza es la acción y efecto de limpiar (quitar la suciedad, las imperfecciones o los defectos de algo; sacar las hojas secas o vainas de las hortalizas y legumbres; hacer que un lugar quede sin aquello que le es perjudicial).</p>
                    <p>La limpieza puede asociarse con la higiene (las técnicas que aplican las personas para limpiar su cuerpo y controlar los factores que pueden ejercer un efecto negativo sobre la salud). A través de la limpieza e higiene, se busca eliminar los microorganismos de la piel y de los objetos que están en contacto con el ser humano.</p>
                    <p>Los productos de limpieza son aquellos que ayudan a eliminar la suciedad, como el detergente, la lavandina, el amoníaco o el jabón. Los utensilios de limpieza, por otra parte, son las herramientas y dispositivos que permiten limpiar una superficie (escoba, cepillo, esponja, plumero, etc.).</p>
                  </article>

              </div>
            </div>
            <div class="row features">
              <section class="4u 12u(narrower) feature">
                <div class="image-wrapper first">
                  <a href="#" class="image featured"><img src="images/1.png" alt="" /></a>
                </div>
                <!-- <header>
                  <h3>Dolor sit consequat magna</h3>
                </header>
                <p>Lorem ipsum dolor sit amet consectetur et sed adipiscing elit. Curabitur
                vel sem sit dolor neque semper magna lorem ipsum.</p>
                <ul class="actions">
                  <li><a href="#" class="button">Elevate my awareness</a></li>
                </ul> -->
              </section>
              <section class="4u 12u(narrower) feature">
                <div class="image-wrapper">
                  <a href="#" class="image featured"><img src="images/22.png" alt="" /></a>
                </div>
                <!-- <header>
                  <h3>Dolor sit consequat magna</h3>
                </header>
                <p>Lorem ipsum dolor sit amet consectetur et sed adipiscing elit. Curabitur
                vel sem sit dolor neque semper magna lorem ipsum.</p>
                <ul class="actions">
                  <li><a href="#" class="button">Elevate my awareness</a></li>
                </ul> -->
              </section>
              <section class="4u 12u(narrower) feature">
                <div class="image-wrapper">
                  <a href="#" class="image featured"><img src="images/33.png" alt="" /></a>
                </div>
                <!-- <header>
                  <h3>Dolor sit consequat magna</h3>
                </header>
                <p>Lorem ipsum dolor sit amet consectetur et sed adipiscing elit. Curabitur
                vel sem sit dolor neque semper magna lorem ipsum.</p>
                <ul class="actions">
                  <li><a href="#" class="button">Elevate my awareness</a></li>
                </ul> -->
              </section>
            </div>

            <h2>Top 5 Sanitarios más votados.</h2>
            <p></p>

              <table class="table table-striped">
            <thead>
              <tr>
                <th>Edificio</th>
                <th>Género</th>
                <th>Ubicación</th>
                 <th>Estatus</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $link = @mysql_connect("localhost", "root","sr1920la")
                    or die ("Error al conectar a la base de datos Error en la contraseña o algo.");
                @mysql_select_db("Encuesta", $link)
                    or die ("Error al conectar a la base de datos Error al conectrase con la base de datos.");



          $query = 'SELECT b.Descripcion As "Edificio", d.Descipcion As "Genero", c.Descripcion As "Ubicacion", e.Descripcion AS "Estatus" , COUNT(IdRegistro) As "Total" FROM movcregistrovotos a INNER JOIN catcedificios b on a.IdEdificio = b.IdEdificio inner join catcubicaciones c on a.IdUbicacion = c.IdUbicacion inner join catcgenero d on a.IdGenero = d.IdGenero inner join catcestatus e on a.IdEstatus = e.IdEstatus GROUP BY b.Descripcion , d.Descipcion , c.Descripcion, e.Descripcion ORDER BY 5 DESC LIMIT 5';

                $result = mysql_query($query);

                while($row = mysql_fetch_array($result))
                {




                       echo '
                       <tr>
                         <th scope="row" >'.$row["Edificio"].'</th>
                         <td>'.  $row["Genero"] .'</td>
                         <td>'.  $row["Ubicacion"].'</td>
                         <td>'.$row["Estatus"].'</td>
                          <td>'.$row["Total"].'</td>

                       </tr>';




                }


                mysql_free_result($result);
                mysql_close($link);
              ?>

            </tbody>
          </table>


          </div>







        </div>

			<!-- Footer -->
				<div id="footer-wrapper">
					<div id="footer" class="container">
						<header class="major">
							<h2>La mejor ubicación sanitaria por votos.</h2>



						</header>

						<!--  -->

						<table class="table table-striped">
					<thead>
						<tr>
							<th>Edificio</th>
							<th>Género</th>
							<th>Ubicación</th>
							 <th>Estatus</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$link = @mysql_connect("localhost", "root","sr1920la")
									or die ("Error al conectar a la base de datos Error en la contraseña o algo.");
							@mysql_select_db("Encuesta", $link)
									or die ("Error al conectar a la base de datos Error al conectrase con la base de datos.");



$query = 'SELECT  b.Descripcion As "Edificio", d.Descipcion As "Genero", c.Descripcion As "Ubicacion", e.Descripcion AS "Estatus" , COUNT(IdRegistro) As "Total" FROM movcregistrovotos a INNER JOIN catcedificios b on a.IdEdificio = b.IdEdificio inner join catcubicaciones c on a.IdUbicacion = c.IdUbicacion inner join catcgenero d on a.IdGenero = d.IdGenero inner join catcestatus e on a.IdEstatus = e.IdEstatus  WHERE a.IdEstatus = 1  GROUP BY b.Descripcion , d.Descipcion , c.Descripcion, e.Descripcion ORDER BY 5 DESC LIMIT 1';

							$result = mysql_query($query);

							while($row = mysql_fetch_array($result))
							{
										 echo '
										 <tr>
											 <th scope="row" style="color:green;">'.$row["Edificio"].'</th>
											 <td style="color:green;">'.  $row["Genero"] .'</td>
											 <td style="color:green;">'.  $row["Ubicacion"].'</td>
											 <td style="color:green;">'.$row["Estatus"].'</td>
												<td style="color:green;">'.$row["Total"].'</td>

										 </tr>';
							}
							mysql_free_result($result);
							mysql_close($link);
						?>

					</tbody>
				</table>
						<!--  -->
<br>

						<header class="major">
							<h2>La peor ubicación sanitaria por votos.</h2>

						</header>

						<!--  -->

						<table class="table table-striped">
					<thead>
						<tr>
							<th>Edificio</th>
							<th>Genero</th>
							<th>Ubicación</th>
							 <th>Estatus</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$link = @mysql_connect("localhost", "root","sr1920la")
									or die ("Error al conectar a la base de datos Error en la contraseña o algo.");
							@mysql_select_db("Encuesta", $link)
									or die ("Error al conectar a la base de datos Error al conectrase con la base de datos.");



$query = 'SELECT  b.Descripcion As "Edificio", d.Descipcion As "Genero", c.Descripcion As "Ubicacion", e.Descripcion AS "Estatus" , COUNT(IdRegistro) As "Total" FROM movcregistrovotos a INNER JOIN catcedificios b on a.IdEdificio = b.IdEdificio inner join catcubicaciones c on a.IdUbicacion = c.IdUbicacion inner join catcgenero d on a.IdGenero = d.IdGenero inner join catcestatus e on a.IdEstatus = e.IdEstatus  WHERE a.IdEstatus = 3  GROUP BY b.Descripcion , d.Descipcion , c.Descripcion, e.Descripcion ORDER BY 5 DESC LIMIT 1';

							$result = mysql_query($query);

							while($row = mysql_fetch_array($result))
							{
										 echo '
										 <tr>
											 <th scope="row" style="color:red;">'.$row["Edificio"].'</th>
											 <td style="color:red;">'.  $row["Genero"] .'</td>
											 <td style="color:red;">'.  $row["Ubicacion"].'</td>
											 <td style="color:red;">'.$row["Estatus"].'</td>
												<td style="color:red;" >'.$row["Total"].'</td>

										 </tr>';
							}
							mysql_free_result($result);
							mysql_close($link);
						?>

					</tbody>
				</table>
						<!--  -->






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
