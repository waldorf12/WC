<?php
$nombre = $_SESSION['username'];
$Nivel= $_SESSION['nivel'];

  $Header = '<ul>
    <li>
      <a href="PanelControl.php">INICIO</a>
    </li>
    <li><a href="indicadores.php">INDICADORES</a>
      <ul>
        <li  ><a href="indicadores.php">Votos por Fecha</a></li>

        <li  ><a href="UbicacionesPositivas.php">Sanitarios Votados Positivos</a></li>
        <li><a href="UbicacionesNegativas.php">Sanitarios Votados Negativos</a></li>
        <li><a href="UbicacionesNeutrales.php">Sanitarios Votados Neutrales</a></li>
        <li><a href="TodosVotos.php">Todos los Votos</a></li>
          <li><a href="Visuales.php">Visuales</a></li>
          
      </ul>
    </li>
    <li class="break"><a href="ModificarPerfil.php?Accion=3">PERFIL</a></li>
    <li><a href="logout.php">CERRAR SESIÓN</a>
      <ul>
        <li><a href="logout.php">Usuario: ['.$nombre.']</a></li>
      </ul>
    </li>
  </ul>';

 ?>
