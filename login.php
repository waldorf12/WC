<?php
session_start();


	$host_db = "localhost";
	$user_db = "root";
	$pass_db = "sr1920la";
	$db_name = "Encuesta";
	$tbl_name = "Usuarios";
		$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

	if ($conexion->connect_error) {
	 die("La conexion falló: " . $conexion->connect_error);
	}

	$username = $_POST['username'];
	$password = $_POST['password'];

  // echo "$username";

  if ($username == '')
  {
   header('Location: Error.php');
  }
  if ($_POST["username"] == '' || $_POST["password"] == '' )
   {
     header('Location: Error.php');
       session_destroy();

  exit;
  }



	$sql = "SELECT * FROM $tbl_name WHERE Usuario = '$username'";

  // echo $sql;

	$result = $conexion->query($sql);


	if ($result->num_rows > 0) {
	 }
	 $row = $result->fetch_array(MYSQLI_ASSOC);

  //  echo $row['Password'];
	 if ( $password == $row['Password'] ) {

	    $_SESSION['loggedin'] = true;
	    $_SESSION['username'] = $username;
	    $_SESSION['start'] = time();
	    $_SESSION['expire'] = $_SESSION['start'] + (15 * 60);
			$_SESSION['nivel'] = $row['IdNivel'];

	    echo "Bienvenido! " . $_SESSION['username'];
	     header('Location: PanelControl.php');
	 } else {
	    header('Location: Error.php');

    // echo "error";


	 }
	 mysqli_close($conexion);
	 ?>
