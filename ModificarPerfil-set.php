<?php

$OldUsername = $_POST['OldUsername'];
$NewUsuario  = $_POST['NewUsername'];
$ContraseñaActual  = $_POST['Password'];
$Nivel  = $_POST['Nivel'];
$UsrOriginal  = $_POST['UsrOriginal'];


$NewPass  = $_POST['NewPassword'];
$NewPass2  = $_POST['NewPassword2'];

$host_db = "localhost";
$user_db = "root";
$pass_db = "sr1920la";
$db_name = "Encuesta";
$tbl_name = "Usuarios";
$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$sql = "SELECT * FROM $tbl_name WHERE Usuario = '$OldUsername'";

// echo $sql;

$result = $conexion->query($sql);


if ($result->num_rows > 0) {}

$row = $result->fetch_array(MYSQLI_ASSOC);

//  echo $row['Password'];


if ( $row['Password']  == $ContraseñaActual )

 {
        if ($NewUsuario == '')
         {
           if ($NewPass == '')
            {
              header('Location: ModificarPerfil.php?Accion=9&Mensaje=Campos Vacios');
           }
           else
           {
              if ($ContraseñaActual != $NewPass )
              {
                // Solo Cambio de contraseña
                $sql = 'UPDATE usuarios set Password = "'.$NewPass.'" where Usuario = "'.$OldUsername.'"';

                if ( $conexion->query($sql) )
                {
                  header('Location: ModificarPerfil.php?Accion=6&Mensaje=Contraseña cambiada con exito');

                }
                else {
                  header('Location: ModificarPerfil.php?Accion=8&Mensaje=Error SQL ');

                }


              }
              else {
                header('Location: ModificarPerfil.php?Accion=9&Mensaje=La contraseña es la misma ');
              }
           }

        }
        else {

          if ($NewPass == '')
           {
                if ($OldUsername != $NewUsuario )
                 {
                   $sql = 'UPDATE usuarios set Usuario = "'.$NewUsuario.'" where Usuario = "'.$OldUsername.'"';

                   if ( $conexion->query($sql) )
                   {
                     header('Location: ModificarPerfil.php?Accion=10&Mensaje=Usuario cambiado con exito');

                   }
                   else {
                     header('Location: ModificarPerfil.php?Accion=8&Mensaje=Error SQL ');

                   }


                }else {
                  header('Location: ModificarPerfil.php?Accion=9&Mensaje=El Usuario es el mismo ');
                }
          }
          else
          {
             if (  $OldUsername != $NewUsuario  )
             {
               // Cambio de contraseña y de usuario al mismo tiempo

               $sql = 'UPDATE usuarios set Password = "'.$NewPass.'" , Usuario = "'.$NewUsuario.'" where Usuario = "'.$OldUsername.'"';

               if ( $conexion->query($sql) )
               {
                 header('Location: ModificarPerfil.php?Accion=10&Mensaje=Usuario cambiado con exito');

               }
               else {
                 header('Location: ModificarPerfil.php?Accion=8&Mensaje=Error SQL ');

               }



             }
             else {
               header('Location: ModificarPerfil.php?Accion=9&Mensaje=Algunos datos son identicos a los anteriores');
             }
          }


        }
}

elseif ($Nivel == 1)
{

  //

  $sql = "SELECT * FROM $tbl_name WHERE Usuario = '$UsrOriginal'";

  // echo $sql;

  $result = $conexion->query($sql);


  if ($result->num_rows > 0) {}

  $row = $result->fetch_array(MYSQLI_ASSOC);
  //
if ($row['Password']  == $ContraseñaActual)

{

  if ($NewUsuario == '')
   {
     if ($NewPass == '')
      {
        header('Location: ModificarPerfil.php?Accion=9&Mensaje=Campos Vacios');
     }
     else
     {
        if ($ContraseñaActual != $NewPass )
        {
          // Solo Cambio de contraseña
          $sql = 'UPDATE usuarios set Password = "'.$NewPass.'" where Usuario = "'.$OldUsername.'"';

          if ( $conexion->query($sql) )
          {
            header('Location: ModificarPerfil.php?Accion=6&Mensaje=Contraseña cambiada con exito');

          }
          else {
            header('Location: ModificarPerfil.php?Accion=8&Mensaje=Error SQL ');

          }


        }
        else {
          header('Location: ModificarPerfil.php?Accion=9&Mensaje=La contraseña es la misma ');
        }
     }

  }
  else {

    if ($NewPass == '')
     {
          if ($OldUsername != $NewUsuario )
           {
             $sql = 'UPDATE usuarios set Usuario = "'.$NewUsuario.'" where Usuario = "'.$OldUsername.'"';

             if ( $conexion->query($sql) )
             {
               header('Location: ModificarPerfil.php?Accion=6&Mensaje=Usuario cambiado con exito');

             }
             else {
               header('Location: ModificarPerfil.php?Accion=8&Mensaje=Error SQL ');

             }


          }else {
            header('Location: ModificarPerfil.php?Accion=9&Mensaje=El Usuario es el mismo ');
          }
    }
    else
    {
       if (  $OldUsername != $NewUsuario  )
       {
         // Cambio de contraseña y de usuario al mismo tiempo

         $sql = 'UPDATE usuarios set Password = "'.$NewPass.'" , Usuario = "'.$NewUsuario.'" where Usuario = "'.$OldUsername.'"';

         if ( $conexion->query($sql) )
         {
           header('Location: ModificarPerfil.php?Accion=6&Mensaje=Usuario cambiado con exito');

         }
         else {
           header('Location: ModificarPerfil.php?Accion=8&Mensaje=Error SQL ');

         }



       }
       else {
         header('Location: ModificarPerfil.php?Accion=9&Mensaje=Algunos datos son identicos a los anteriores');
       }
    }


  }


}else {
  header('Location: ModificarPerfil.php?Accion=7&Mensaje=La contraseña del administrador no es correcta');
}


}
else {
  header('Location: ModificarPerfil.php?Accion=7');

}



  // echo "error";



 mysqli_close($conexion);



 ?>
