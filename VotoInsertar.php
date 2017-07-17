<?php
  $link = @mysql_connect("localhost", "root","sr1920la")
      or die ("Error al conectar a la base de datos.");
  @mysql_select_db("Encuesta", $link)
      or die ("Error al conectar a la base de datos.");

    date_default_timezone_set('America/Chihuahua');

$hoy = date("Y-m-d");
$hora = date("H:i:s");

$IdEdificio = $_GET['Edificio'];
$IdUbicacion = $_GET['Ubicacion'];
$IdGenero = $_GET['Genero'];
$IdEstatus = $_GET['Estatus'];

$FechaHora = $hoy.' '.$hora;


echo $hoy;
echo " | ";
echo $hora;
echo " | ";
echo $IdEdificio;
echo " | ";
echo $IdUbicacion;
echo " | ";
echo $IdGenero;
echo " | ";
echo $IdEstatus;
echo " | ";


$query = 'INSERT INTO movcregistrovotos( IdEdificio, IdUbicacion, IdGenero,IdEstatus, FechaRegistro, HoraRegistro,FechaHora) VALUES ('.$IdEdificio.','.$IdUbicacion.','.$IdGenero.','.$IdEstatus.' ,"'.$hoy.'","'.$hora.'","'.$FechaHora.'")';

// echo $query;



  if ( mysql_query($query) )
  {
      switch ($IdEstatus) {

        case 1:
            header('Location: end.php?Voto=1');
          break;

        case 2:
            header('Location: end.php?Voto=2');
        break;

        case 3:
            header('Location: end.php?Voto=3');
        break;

      }

  }
  else {
    header('Location: Error.php');
  }

// $row = mysql_fetch_array($result);

// manipulacion de variables traidas de la base de datos
  // mysql_free_result($result);
  mysql_close($link);
?>
