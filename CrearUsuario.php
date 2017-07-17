<?php


$NewUsuario  = $_POST['NewUsuario'];
$ContraseñaActual  = $_POST['Password'];
$NewPass  = $_POST['PasswordNew'];
$OldUsername = $_POST['OldUsername'];

$host_db = "localhost";
$user_db = "root";
$pass_db = "sr1920la";
$db_name = "Encuesta";
$tbl_name = "Usuarios";
$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

  date_default_timezone_set('America/Chihuahua');

$hoy = date("Y-m-d");
$hora = date("H:i:s");

$FechaHora = $hoy.' '.$hora;

if ($conexion->connect_error)
{
 die("La conexion falló: " . $conexion->connect_error);
}

$sql = "SELECT * FROM $tbl_name WHERE Usuario = '$OldUsername'";

// echo $sql;

$result = $conexion->query($sql);


if ($result->num_rows > 0) {}

$row = $result->fetch_array(MYSQLI_ASSOC);

//  echo $row['Password'];
echo $row['Password'];

echo $ContraseñaActual;

if ( $row['Password']  == $ContraseñaActual )

 {

   $sql = 'INSERT INTO Usuarios( Usuario, Password, IdNivel, FechaCreacion) VALUES ("'.$NewUsuario.'","'.$NewPass.'",2,"'.$FechaHora.'")';

// echo $sql;
   if ( $conexion->query($sql) )
   {
     header('Location: ModificarPerfil.php?Accion=6&Mensaje=Usuario Agregado con exito');

   }
   else {
     header('Location: ModificarPerfil.php?Accion=8&Mensaje=Error SQL ');

   }


}
else {
  header('Location: ModificarPerfil.php?Accion=7');

}



  // echo "error";



 mysqli_close($conexion);



 ?>
