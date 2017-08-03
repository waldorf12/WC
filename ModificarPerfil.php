<?php

include 'LibSesiones.php';
include 'NavigationBar.php';
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
					<?php echo $Nav; ?>
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
                      <p>En esta sección se puede modificar su usuario y contraseña así como la creación de nuevos usuarios que puedan acceder a la plataforma.</p>
                  <ul class="actions">
                      <?php

												if ($_SESSION['nivel'] == 1) {


													echo '  <li><a href="ModificarPerfil.php?Accion=1" class="button">Crear Cuenta</a></li>';
												}

											 ?>

                      </ul>
                    </section>
                    <section>
                      <!-- <a href="#" class="image featured"><img src="images/chart.png" alt="" /></a> -->


                    </section>
                  </section>

              </div>
              <div class="8u 12u(narrower) important(narrower)">

                <!-- Content -->
                  <!-- <article id="content">
                    <header>
                      <h2 ALIGN=center >PLATAFORMA ESTRATEGICA DE SEGUIMIENTO SANITARIO</h2>
                      <p>Plataforma creada con la finalidad de monitorear y dar seguimiento al estatus de los sanitarios presentes en la facultad.</p>
                    </header>
                    <a href="#" class="image featured"><img src="images/portadaweb.png" alt="" /></a>
                    <p>Limpieza es la acción y efecto de limpiar (quitar la suciedad, las imperfecciones o los defectos de algo; sacar las hojas secas o vainas de las hortalizas y legumbres; hacer que un lugar quede sin aquello que le es perjudicial).</p>
                    <p>La limpieza puede asociarse con la higiene (las técnicas que aplican las personas para limpiar su cuerpo y controlar los factores que pueden ejercer un efecto negativo sobre la salud). A través de la limpieza e higiene, se busca eliminar los microorganismos de la piel y de los objetos que están en contacto con el ser humano.</p>
                    <p>Los productos de limpieza son aquellos que ayudan a eliminar la suciedad, como el detergente, la lavandina, el amoníaco o el jabón. Los utensilios de limpieza, por otra parte, son las herramientas y dispositivos que permiten limpiar una superficie (escoba, cepillo, esponja, plumero, etc.).</p>
                  </article> -->

                <?php

                  $Accion = $_GET['Accion'];

									if ($Accion == 8 )
									{
										 $Mensaje = $_GET['Mensaje'];
										echo '<div class="alert alert-danger" role="alert">
													  <strong>'.$Mensaje.'</strong> No se pudo realizar el cambio.
													</div>				<a href="ModificarPerfil.php?Accion=3">	<input type="button" name="" value="Regresar"></a>
													';
									}
									elseif ($Accion == 7)
									{
										  $Mensaje = $_GET['Mensaje'];
										echo '<div class="alert alert-warning" role="alert">
											  <strong>'.$Mensaje.'</strong> Contraseña incorrecta.
											</div>				<a href="ModificarPerfil.php?Accion=3">	<input type="button" name="" value="Regresar"></a>';
									}
									elseif ($Accion == 6)
									 {
										  $Mensaje = $_GET['Mensaje'];
										echo '<div class="alert alert-success" role="alert">
										  <strong>'.$Mensaje.'</strong> Se ha actualizado su perfil</a>.
										</div>				<a href="ModificarPerfil.php?Accion=3">	<input type="button" name="" value="Regresar"></a>';
									}
									elseif ($Accion == 9)
									 {
										 $Mensaje = $_GET['Mensaje'];
										echo '<div class="alert alert-info" role="alert">
											<strong>  '.$Mensaje.'  </strong>No se ha modificado nada de su perfil</a>.
										</div>				<a href="ModificarPerfil.php?Accion=3">	<input type="button" name="" value="Regresar"></a>';
									}
									elseif ($Accion == 10)
									 {
										 $Mensaje = $_GET['Mensaje'];
									 echo '<div class="alert alert-success" role="alert">
										 <strong>'.$Mensaje.'</strong> Se ha actualizado su perfil</a>.
									 </div>';
									 echo '<div class="alert alert-info" role="alert">
										 <strong> Cerrando Sesión  </strong>Favor de inciar sesión nuevamente.</a>.
									 </div><a href="ModificarPerfil.php?Accion=3">	<input type="button" name="" value="Regresar"></a>
									 ';

									 session_destroy();


									}

                  if ($Accion == 3 )
                  {
                      echo '
                      <section class="12u 12u(narrower)">
                        <form method="post" action="ModificarPerfil-set.php">
                          <div class="row 100%">
                            <div class="12u 12u(mobile)">
                              <label for="">Usuario</label>
                              <input name="OldUsername" value="'.$nombre.'" type="text" readonly />
                            </div>

                          </div>
													<div class="row 100%">
														<div class="12u 12u(mobile)">
															<label for="">Nuevo Nombre de Usuario</label>
															<input name="NewUsername" value="" type="text" />
														</div>

													</div>
                          <div class="row 100%">
                            <div class="12u 12u(mobile)">
                              <label for="">Contraseña Actual</label>
                              <input type="password" name="Password"  type="text" required />
                            </div>

                          </div>

                          <div class="row 50%">
                            <div class="6u 12u(mobile)">
                              <label for="">Nueva Contraseña</label>
                              <input type="password" name="NewPassword" placeholder="" type="text"  />
                            </div>
                            <div class="6u 12u(mobile)">
                              <label for="">Repetir Nueva Contraseña</label>
                              <input type="password" name="NewPassword2" placeholder="" type="text"  />
                            </div>

                          </div>

                          <div class="row 50%">
                            <div class="12u">
                              <ul class="actions">
                                <li><input type="submit" value="Actualizar" /></li>
                              </ul>
                            </div>
                          </div>
                        </form>
                      </section>

                      ';
                  }
									elseif ($Accion == 1)
									 {

										 echo '
										 <section class="12u 12u(narrower)">
											 <form method="post" action="CrearUsuario.php">

												<div class="row 100%">
													<div class="12u 12u(mobile)">
														<label for=""> Usuario</label>
														<input name="NewUsuario" value="" type="text" />
													</div>

												</div>


												 <div class="row 100%">
													 <div class="12u 12u(mobile)">
														 <label for=""> Contraseña</label>
														 <input type="password" name="PasswordNew" placeholder="" type="text"  />
													 </div>


												 </div>
												 <div class="row 100%">
													 <div class="12u 12u(mobile)">
														 <label for="">Contraseña Actual</label>
														 <input type="password" name="Password"  type="text" required />
														 <input name="OldUsername" value="'.$nombre.'" type="text" style="display:none;" />


													 </div>

												 </div>

												 <div class="row 50%">
													 <div class="12u">
														 <ul class="actions">
															 <li><input type="submit" value="Crear" /></li>
														 </ul>
													 </div>
												 </div>
											 </form>
										 </section>

										 ';



									}


                 ?>

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

						<div class="">

			<?php
					if ($_SESSION['nivel'] == 1)
					{

				echo '<table class="table table-striped">
					<thead>
						<tr>
							<th>Modificar</th>
							<th>Usuario</th>
							<th>Fecha Creación</th>
							 <th>Nivel</th>
						</tr>
					</thead>
					<tbody>';
						# code...
					}

			 ?>
							<?php
								$link = @mysql_connect("localhost", "root","sr1920la")
										or die ("Error al conectar a la base de datos Error en la contraseña o algo.");
								@mysql_select_db("Encuesta", $link)
										or die ("Error al conectar a la base de datos Error al conectrase con la base de datos.");



					$query = 'SELECT a.IdUsuario AS "IdUsuario" ,a.Usuario As Usuario, a.FechaCreacion As "FechaCreacion" , b.Descripcion As "Nivel" FROM Usuarios a inner join catcniveles b on a.IdNivel = b.IdNivel  ';

								$result = mysql_query($query);

								while($row = mysql_fetch_array($result))
								{


									if ($_SESSION['nivel'] == 1) {


										echo '
									 <tr>
									 <th ><a href="actualizarUsuario.php?IdUsuario='.$row["IdUsuario"].'&Usuario='.$row["Usuario"].'&Accion=3"><span class="btn btn-secundary"><span class="icon fa-pencil"></span></span></a></th>
										 <td>'.  $row["Usuario"] .'</td>
										 <td>'.  $row["FechaCreacion"].'</td>
										 <td >'.$row["Nivel"].'</td>
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

			<!-- Footer -->
				<div id="footer-wrapper">


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
