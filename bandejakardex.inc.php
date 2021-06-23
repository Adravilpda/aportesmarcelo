<link href="css/principal.css" rel="stylesheet" type="text/css" />

<?php include "includes/cabecera2.php";
		include "conexion.inc.php";
?>

<?PHP
SESSION_START();
$ci=$_POST["ci"];
$usuario=$_POST["nombrec"];
$rol=$_POST["rol"];
$Usuariog=$_SESSION['usuariog'];
$rolg=$_SESSION['rolg'];
$cig=$_SESSION['cig'];
if($rolg=='U'){
	echo "<h3>Usuario: ".$Usuariog."</br>";
	echo "C.I.: ".$cig."</br>";
	
}else{
	echo "<h3>Administrador:".$Usuariog."</br>";
	
}
?>
<form action="motor.php" method="GET">
	<input type="hidden" value="<?php echo $usuario;?>" name="nombrec"/>
	<input type="hidden" value="<?php echo $ci;?>" name="ci"/>
	<input type="hidden" value="F1" name="flujo"/>
	<input type="hidden" value="P1" name="proceso"/>
	<input type="hidden" value="<?php echo $rol?>;" name="rol"/>
	<input type="submit" value="Aportar" >
</form>

<?php

$entrada='si';
$salida='no';

	include "conexion.inc.php";
?>

<table border=3 width=150>	
<tr><td><a href="entradakardex.inc.php" target="cuerpoK">ENTRADA</a></td></tr></br>
<tr><td><a href="salidakardex.inc.php" target="cuerpoK">SALIDA</a></td></tr>
<tr><td>...</td></tr>
<tr><td>...</td></tr>
<tr><td>...</td></tr>
<tr><td>...</td></tr>
<tr><td>...</td></tr>
<tr><td>...</td></tr>
<?php
	if($rolg=='K'){
?>
<tr><td><a href="procesosAlumnos.inc.php" target="cuerpoK">PROCESOS PENDIENTES</a></td></tr>
		
	<h4>Carga Trabajo</h4>

<?php	
	echo "P5 :".$cargap5."</br>";
	echo "P7 :".$cargap7."</br>";
	echo "P8 :".$cargap8."</br>";
	echo "P9 :".$cargap9."</br>";
	echo "</br>";
	}
?>

<tr><td>...</td></tr>
<tr><td>...</td></tr>
</table>	
<div class="cuerpoKardex">
      <h4>Actividad</h4>
	  <iframe  name="cuerpoK" src="entradakardex.inc.php" width=750 height=400 >
	  </iframe>	  	  
	</div>

<center>
      <h1>................................</h1>
	  

      <p>LSM - Comunidad  © 2020 - 2021
Página creada por Marcelo Nio | Todos los derechos reservados</p>
    </center>
  