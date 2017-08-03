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


	if($now > $_SESSION['expire']) {
	session_destroy();

     header('Location: TiempoAgotado.html');
       session_destroy();
	exit;
	}


 ?>
