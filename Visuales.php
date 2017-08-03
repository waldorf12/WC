<?php

include 'LibSesiones.php';
include 'NavigationBar.php';


date_default_timezone_set('America/Chihuahua');
$fecha = date("d-m-Y");

$diaInicio="Monday";
$diaFin="Sunday";

$strFecha = strtotime($fecha);

$fechaInicio = date('d-m-Y',strtotime('last '.$diaInicio,$strFecha));
$fechaFin = date('d-m-Y',strtotime('next '.$diaFin,$strFecha));

if(date("l",$strFecha)==$diaInicio){
$fechaInicio= date("d-m-Y",$strFecha);
}
if(date("l",$strFecha)==$diaFin){
$fechaFin= date("d-m-Y",$strFecha);
}

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

    <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>


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

                        <h3></h3>
                      </header>
                      <!-- <p>En esta seccion se puede modificar su usuario y contraseña asi como la creacion de nuevos usuarios que puedan acceder a la plataforma.</p> -->
                      <ul class="actions">
                        <!-- <li><a href="Perfil.php" class="button">Edicion de Perfil</a></li> -->
                      </ul>
                    </section>
                    <section>
                      <!-- <a href="#" class="image featured"><img src="images/chart.png" alt="" /></a> -->

                      <header>
                        <h3></h3>
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
                      <!-- <h2 ALIGN=center >INDICADORES VISUALES</h2> -->
                      <!-- <p>Plataforma creada con la finalidad de monitorear y dar seguimiento al estatus de los sanitarios presentes en la facultad.</p> -->
                    </header>

                    <h3>Top Semanal Votos  Del <b><?php echo $fechaInicio; ?></b>  Al <b><?php echo $fechaFin;  ?></b></h3>

                    <br>
                    <div id="Top5" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                    <br>

                    <h3>Top Semanal Votos <b>Negativos</b> Del <b><?php echo $fechaInicio; ?></b>  Al <b><?php echo $fechaFin;  ?></b></h3>
                    <br>
                    <div id="Top5Negativos" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>



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



          $query = 'SELECT b.Descripcion As "Edificio", d.Descipcion As "Genero", c.Descripcion As "Ubicacion", e.Descripcion AS "Estatus" , COUNT(IdRegistro) As "Total" , CONCAT(b.Descripcion,"-",c.DesCorta,"-",d.DesCorta,"-",e.Descripcion ) As DesCompleta FROM movcregistrovotos a INNER JOIN catcedificios b on a.IdEdificio = b.IdEdificio inner join catcubicaciones c on a.IdUbicacion = c.IdUbicacion inner join catcgenero d on a.IdGenero = d.IdGenero inner join catcestatus e on a.IdEstatus = e.IdEstatus  GROUP BY b.Descripcion , d.Descipcion , c.Descripcion, e.Descripcion ORDER BY 5 DESC LIMIT 5';
          // echo $query;

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
            <!-- <div id="Global" style="min-width: 310px; height: 400px; margin: 0 auto"></div> -->

            <?php
      $fecha = date("Y-m-d");

      $diaInicio="Monday";
      $diaFin="Sunday";

      $strFecha = strtotime($fecha);

      $fechaInicio = date('Y-m-d',strtotime('last '.$diaInicio,$strFecha));
      $fechaFin = date('Y-m-d',strtotime('next '.$diaFin,$strFecha));

      if(date("l",$strFecha)==$diaInicio){
          $fechaInicio= date("Y-m-d",$strFecha);
      }
      if(date("l",$strFecha)==$diaFin){
          $fechaFin= date("Y-m-d",$strFecha);
      }

        // echo $fechaInicio;
        // echo "adsfsdf";
        // echo $fechaFin;






             ?>



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
<script type="text/javascript">
// Highcharts.chart('Global', {
//   chart: {
//       type: 'column'
//   },
//   title: {
//       text: 'Votos Globales'
//   },
//   subtitle: {
//       text: 'Todas las ubicaciones'
//   },
//   xAxis: {
//       categories: [
//
//         <?php
//
//         $link = @mysql_connect("localhost", "root","sr1920la")
//             or die ("Error al conectar a la base de datos Error en la contraseña o algo.");
//         @mysql_select_db("Encuesta", $link)
//             or die ("Error al conectar a la base de datos Error al conectrase con la base de datos.");
//   $query = 'SELECT b.Descripcion As "Edificio",a.IdEdificio, d.Descipcion As "Genero", c.Descripcion As "Ubicacion",a.IdEstatus, e.Descripcion AS "Estatus", CONCAT(b.Descripcion, "-", c.DesCorta , "-",d.DesCorta ) As Chart FROM movcregistrovotos a INNER JOIN catcedificios b on a.IdEdificio = b.IdEdificio inner join catcubicaciones c on a.IdUbicacion = c.IdUbicacion inner join catcgenero d on a.IdGenero = d.IdGenero inner join catcestatus e on a.IdEstatus = e.IdEstatus where a.IdEstatus = 1 OR a.IdEstatus = 2 OR a.IdEstatus = 3 GROUP BY b.Descripcion , d.Descipcion , c.Descripcion ORDER BY 2,4 DESC ';
//         $result = mysql_query($query);
//         while($row = mysql_fetch_array($result))
//         {
//                echo '"'.$row["Chart"].'"'.',' ;
//         }
//         mysql_free_result($result);
//         mysql_close($link);
//           ?>
//       ],
//       crosshair: true
//   },
//   yAxis: {
//       min: 0,
//       title: {
//           text:" Votos"
//       }
//   },
//   tooltip: {
//       headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
//       pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
//           '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
//       footerFormat: '</table>',
//       shared: true,
//
//       useHTML: true
//   },
//   plotOptions: {
//       column: {
//           pointPadding: 0.2,
//           borderWidth: 0,
//       showInLegend: true
//       }
//   },
//
//   series: [{
//       name: "Felices",
//
//
//
//       data: [
//
//
//
//         <?php
//
//         $link = @mysql_connect("localhost", "root","sr1920la")
//             or die ("Error al conectar a la base de datos Error en la contraseña o algo.");
//         @mysql_select_db("Encuesta", $link)
//             or die ("Error al conectar a la base de datos Error al conectrase con la base de datos.");
//   $query = 'SELECT b.Descripcion As "Edificio", d.Descipcion As "Genero", c.Descripcion As "Ubicacion",a.IdEstatus, e.Descripcion AS "Estatus" , COUNT(IdRegistro) As "Total" FROM movcregistrovotos a INNER JOIN catcedificios b on a.IdEdificio = b.IdEdificio inner join catcubicaciones c on a.IdUbicacion = c.IdUbicacion inner join catcgenero d on a.IdGenero = d.IdGenero inner join catcestatus e on a.IdEstatus = e.IdEstatus  where a.IdEstatus = 1 GROUP BY b.Descripcion , d.Descipcion , c.Descripcion, e.Descripcion ORDER BY 4 DESC ';
//         $result = mysql_query($query);
//         while($row = mysql_fetch_array($result))
//         {
//                echo $row["Total"].',' ;
//         }
//         mysql_free_result($result);
//         mysql_close($link);
//           ?>
//       ]
//
//   }, {
//       name: "Neutrales",
//       data: [
//
//         <?php
//
//         $link = @mysql_connect("localhost", "root","sr1920la")
//             or die ("Error al conectar a la base de datos Error en la contraseña o algo.");
//         @mysql_select_db("Encuesta", $link)
//             or die ("Error al conectar a la base de datos Error al conectrase con la base de datos.");
//   $query = 'SELECT b.Descripcion As "Edificio", d.Descipcion As "Genero", c.Descripcion As "Ubicacion",a.IdEstatus, e.Descripcion AS "Estatus" , COUNT(IdRegistro) As "Total" FROM movcregistrovotos a INNER JOIN catcedificios b on a.IdEdificio = b.IdEdificio inner join catcubicaciones c on a.IdUbicacion = c.IdUbicacion inner join catcgenero d on a.IdGenero = d.IdGenero inner join catcestatus e on a.IdEstatus = e.IdEstatus  where a.IdEstatus = 2 GROUP BY b.Descripcion , d.Descipcion , c.Descripcion, e.Descripcion ORDER BY 4 DESC ';
//         $result = mysql_query($query);
//         while($row = mysql_fetch_array($result))
//         {
//                echo $row["Total"].',' ;
//         }
//         mysql_free_result($result);
//         mysql_close($link);
//           ?>
//
//       ]
//
//   }, {
//       name: "Tristes",
//       data: [
//
//         <?php
//
//         $link = @mysql_connect("localhost", "root","sr1920la")
//             or die ("Error al conectar a la base de datos Error en la contraseña o algo.");
//         @mysql_select_db("Encuesta", $link)
//             or die ("Error al conectar a la base de datos Error al conectrase con la base de datos.");
//   $query = 'SELECT b.Descripcion As "Edificio", d.Descipcion As "Genero", c.Descripcion As "Ubicacion",a.IdEstatus, e.Descripcion AS "Estatus" , COUNT(IdRegistro) As "Total" FROM movcregistrovotos a INNER JOIN catcedificios b on a.IdEdificio = b.IdEdificio inner join catcubicaciones c on a.IdUbicacion = c.IdUbicacion inner join catcgenero d on a.IdGenero = d.IdGenero inner join catcestatus e on a.IdEstatus = e.IdEstatus  where a.IdEstatus = 3 GROUP BY b.Descripcion , d.Descipcion , c.Descripcion, e.Descripcion ORDER BY 4 DESC ';
//         $result = mysql_query($query);
//         while($row = mysql_fetch_array($result))
//         {
//                echo $row["Total"].',' ;
//         }
//         mysql_free_result($result);
//         mysql_close($link);
//           ?>
//        ]
//
//   }]
// });
</script>
<script type="text/javascript">

$(document).ready(function () {

  // Build the chart
  Highcharts.chart('Top5', {
      chart: {
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: true,
          type: 'column'
      },
      title: {
          text: ''
      },
      tooltip: {
          pointFormat: '{series.name}</b>'
      },
      plotOptions: {
          column: {
              allowPointSelect: true,
              cursor: 'pointer',
              dataLabels: {
                  enabled: false
              },
              showInLegend: false
          }
      },
      series: [{
          name: 'Edifcio',
          colorByPoint: true,
          data: [


            <?php
    date_default_timezone_set('America/Chihuahua');
            $fecha = date("Y-m-d");

            $diaInicio="Monday";
            $diaFin="Sunday";

            $strFecha = strtotime($fecha);

            $fechaInicio = date('Y-m-d',strtotime('last '.$diaInicio,$strFecha));
            $fechaFin = date('Y-m-d',strtotime('next '.$diaFin,$strFecha));

            if(date("l",$strFecha)==$diaInicio){
                $fechaInicio= date("Y-m-d",$strFecha);
            }
            if(date("l",$strFecha)==$diaFin){
                $fechaFin= date("Y-m-d",$strFecha);
            }


            $link = @mysql_connect("localhost", "root","sr1920la")
                or die ("Error al conectar a la base de datos Error en la contraseña o algo.");
            @mysql_select_db("Encuesta", $link)
                or die ("Error al conectar a la base de datos Error al conectrase con la base de datos.");
      $query = 'SELECT b.Descripcion As "Edificio", d.Descipcion As "Genero", c.Descripcion As "Ubicacion", e.Descripcion AS "Estatus" , COUNT(IdRegistro) As "Total" , CONCAT(b.Descripcion,"-",c.Descripcion,"-",d.DesCorta,"-",e.Descripcion ) As DesCompleta FROM movcregistrovotos a INNER JOIN catcedificios b on a.IdEdificio = b.IdEdificio inner join catcubicaciones c on a.IdUbicacion = c.IdUbicacion inner join catcgenero d on a.IdGenero = d.IdGenero inner join catcestatus e on a.IdEstatus = e.IdEstatus Where a.FechaHora BETWEEN "'.$fechaInicio.'" and "'.$fechaFin.'" GROUP BY b.Descripcion , d.Descipcion , c.Descripcion, e.Descripcion ORDER BY 5 DESC LIMIT 5';
      // echo $query;
            $result = mysql_query($query);
            while($row = mysql_fetch_array($result))
            {
                  //  echo $row["DesCompleta"].',' ;
                   echo '{name: "'.$row["DesCompleta"].'", y: '.$row["Total"].' },';
            }
            mysql_free_result($result);
            mysql_close($link);
              ?>





          ]
      }]
  });
});
</script>
<script type="text/javascript">

Highcharts.chart('Top5Negativos', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: 0,
        plotShadow: false
    },
    title: {
        text: '',
        align: 'center',
        verticalAlign: 'middle',
        y: 40
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        column: {
            dataLabels: {
                enabled: false,
                distance: -50,
                style: {
                    fontWeight: 'bold',
                    color: 'white'
                }
            },
            startAngle: -90,
            endAngle: 90,
            center: ['50%', '75%']
        }
    },
    series: [{
        type: 'pie',
        name: 'Browser share',
        innerSize: '50%',
        data: [


                      <?php
              date_default_timezone_set('America/Chihuahua');
                      $fecha = date("Y-m-d");

                      $diaInicio="Monday";
                      $diaFin="Sunday";

                      $strFecha = strtotime($fecha);

                      $fechaInicio = date('Y-m-d',strtotime('last '.$diaInicio,$strFecha));
                      $fechaFin = date('Y-m-d',strtotime('next '.$diaFin,$strFecha));

                      if(date("l",$strFecha)==$diaInicio){
                          $fechaInicio= date("Y-m-d",$strFecha);
                      }
                      if(date("l",$strFecha)==$diaFin){
                          $fechaFin= date("Y-m-d",$strFecha);
                      }


                      $link = @mysql_connect("localhost", "root","sr1920la")
                          or die ("Error al conectar a la base de datos Error en la contraseña o algo.");
                      @mysql_select_db("Encuesta", $link)
                          or die ("Error al conectar a la base de datos Error al conectrase con la base de datos.");
                $query = 'SELECT b.Descripcion As "Edificio", d.Descipcion As "Genero", c.Descripcion As "Ubicacion", e.Descripcion AS "Estatus" , COUNT(IdRegistro) As "Total" , CONCAT(b.Descripcion,"-",c.DesCorta,"-",d.DesCorta,"-",e.Descripcion ) As DesCompleta FROM movcregistrovotos a INNER JOIN catcedificios b on a.IdEdificio = b.IdEdificio inner join catcubicaciones c on a.IdUbicacion = c.IdUbicacion inner join catcgenero d on a.IdGenero = d.IdGenero inner join catcestatus e on a.IdEstatus = e.IdEstatus Where a.FechaHora BETWEEN "'.$fechaInicio.'" and "'.$fechaFin.'" AND a.IdEstatus = 3 GROUP BY b.Descripcion , d.Descipcion , c.Descripcion, e.Descripcion ORDER BY 5 DESC LIMIT 5';
                // echo $query;
                      $result = mysql_query($query);
                      while($row = mysql_fetch_array($result))
                      {
                            //  echo $row["DesCompleta"].',' ;
                             echo '[ "'.$row["DesCompleta"].'", '.$row["Total"].' ],';
                      }
                      mysql_free_result($result);
                      mysql_close($link);
                        ?>



        ]
    }]
});
</script>
