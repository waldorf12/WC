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



echo $FechaInicial;
echo " | ";
echo $FechaFinal;
echo " | ";
echo $ConHora;
echo " | ";


if ($ConHora =='OFF' )

{
   $FechaInicial = substr( $FechaInicial, 0, -6);
   $FechaFinal = substr( $FechaFinal, 0, -6);
  $query = 'SELECT  b.Descripcion As "Edificio", d.Descipcion As "Genero", c.Descripcion As "Ubicacion", e.Descripcion AS "Estatus" , COUNT(IdRegistro) As "Total" FROM movcregistrovotos a INNER JOIN catcedificios b on a.IdEdificio = b.IdEdificio inner join catcubicaciones c on a.IdUbicacion = c.IdUbicacion inner join catcgenero d on a.IdGenero = d.IdGenero inner join catcestatus e on a.IdEstatus = e.IdEstatus  WHERE a.FechaRegistro BETWEEN "'.$FechaInicial.'" AND "'.$FechaFinal.'"  GROUP BY b.Descripcion , d.Descipcion , c.Descripcion, e.Descripcion';

echo "hola 1";
// echo   $query;

}
else if ($ConHora == 'on')
 {

  $FechaInicial2 = substr( $FechaInicial, 0, -6);
  $FechaFinal2 = substr( $FechaFinal, 0, -6);

  $HoraInicial = substr( $FechaInicial, 11, 6);
  $HoraFinal = substr( $FechaFinal,11 , 6);

$HoraInicial = $HoraInicial.':00';
$HoraFinal = $HoraFinal.':00';

 $query = 'SELECT b.Descripcion As "Edificio", d.Descipcion As "Genero", c.Descripcion As "Ubicacion",e.IdEstatus, e.Descripcion AS "Estatus" , a.FechaRegistro As "Fecha", a.HoraRegistro As "Hora" FROM movcregistrovotos a INNER JOIN catcedificios b on a.IdEdificio = b.IdEdificio inner join catcubicaciones c on a.IdUbicacion = c.IdUbicacion inner join catcgenero d on a.IdGenero = d.IdGenero inner join catcestatus e on a.IdEstatus = e.IdEstatus WHERE a.FechaRegistro BETWEEN "'.$FechaInicial2.'" AND "'.$FechaFinal2.'" AND a.HoraRegistro BETWEEN "'.$HoraInicial.'" AND "'.$HoraFinal.'"  ORDER BY 1,5';

echo   $query;

// echo $HoraInicial ;
// echo "|";
// echo $HoraFinal;

// echo "hola 2";
}




// echo $query;



  // if ( mysql_query($query) )
  // {
  //     switch ($IdEstatus) {
  //
  //       case 1:
  //           header('Location: end.php?Voto=1');
  //         break;
  //
  //       case 2:
  //           header('Location: end.php?Voto=2');
  //       break;
  //
  //       case 3:
  //           header('Location: end.php?Voto=3');
  //       break;
  //
  //     }
  //
  // }
  // else {
  //   header('Location: Error.php');
  // }

// $row = mysql_fetch_array($result);

// manipulacion de variables traidas de la base de datos
  // mysql_free_result($result);
  mysql_close($link);

	?>
