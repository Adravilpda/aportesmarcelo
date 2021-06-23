<link href="css/principal.css" rel="stylesheet" type="text/css" />
<h1>Bandeja</h1>

<?PHP
SESSION_START();
$ci=$_POST["ci"];
$usuario=$_POST["nombrec"];
$rol=$_POST["rol"];
$Usuariog=$_SESSION['usuariog'];
$rolg=$_SESSION['rolg'];
$cig=$_SESSION['cig'];
if($rolg=='U'){
	echo "<h3>Univ: ".$Usuariog."</br>";
	echo "C.I.: ".$cig."</br>";
}else{
	echo "Kardixta:".$Usuariog."</br>";
	
}

$entrada='si';
$salida='no';

	include "conexion.inc.php";
	if($rol=='U'){
		

	
	$sql="select * from seguimiento where usuario='$usuario'";
	$resultado=mysqli_query($conn,$sql);
?>
<table border=1>
<?php	
	while ($fila=mysqli_fetch_array($resultado)){
		

		echo "<tr>";
		echo "<td>$fila[1]</td>";
		echo "<td>$fila[2]</td>";
		echo "<td>$fila[3]</td>"."</br>";
?>
	<td>
	<form action="motor.php" method="GET">
		<input type="hidden" value="<?php echo $usuario; ?>" name="nombrec"/>
		<input type="hidden" value="<?php echo $ci; ?>" name="ci"/>
		<input type="hidden" value="F1" name="flujo"/>
		<input type="hidden" value="P6"name="proceso"/>
		<input type="hidden" value="U"name="rol"/>
		<input type="submit" value="Ir a proceso"/>
	</form>
	</td>
<?php
		echo "<td>hola</td>"."</br>";
		echo "</tr>";
		}
?>
</table>
<?php

		
	}else{
	
		echo "AREA KARDIXTA";
	
?>
	<h5>Verificacion de documentos de alumnos pendientes</h5>
	<table border=2>
	<tr>
		<td>CI</td>
		<td>Usuario</td>
		<td>Verificar</td>
	</tr>



<?php
	
	$sql="select * from alumnosinformatica where estado='sinverificar'";
	$resultado=mysqli_query($conn,$sql);
	
	while ($fila=mysqli_fetch_array($resultado)){
		

		echo "<tr>";
		echo "<td>$fila[1]</td>";
		echo "<td>$fila[2]</td>"."</br>";
?>
	<td>
	<form action="motor.php" method="GET">
		<input type="hidden" value="<?php echo $usuario; ?>" name="nombrec"/>
		<input type="hidden" value="<?php echo $fila[1]; ?>" name="ci"/>
		<input type="hidden" value="F1" name="flujo"/>
		<input type="hidden" value="P5"name="proceso"/>
		<input type="hidden" value="K"name="rol"/>
		<input type="submit" value="Ir a proceso"/>
	</form>
	</td>
<?php
		echo "<td>hola</td>"."</br>";
		echo "</tr>";
	}

?>
</table>
<h5>Verificacion en matriculacion de alumnos pendientes</h5>
	<table border=2>
  <tr>
    <td>CI</td>
    <td>Usuario</td>
	<td>Verificar</td>

  </tr>
<?php
	
	
	$sql="select * from alumnosinformatica where estado='verificado' and matricula='no'";
	$resultado=mysqli_query($conn,$sql);
	
	while ($fila=mysqli_fetch_array($resultado)){
		

		echo "<tr>";
		echo "<td>$fila[1]</td>";
		echo "<td>$fila[2]</td>"."</br>";
?>
	<td>
	<form action="motor.php" method="GET">
		<input type="hidden" value="<?php echo $usuario; ?>" name="nombrec"/>
		<input type="hidden" value="<?php echo $fila[1]; ?>" name="ci"/>
		<input type="hidden" value="F1" name="flujo"/>
		<input type="hidden" value="P7"name="proceso"/>
		<input type="hidden" value="K"name="rol"/>
		<input type="submit" value="Ir a proceso"/>
	</form>
	</td>
<?php
		echo "<td>hola</td>"."</br>";
		echo "</tr>";
	}
	

?>
</table>
<h5>Asignacion de Materias Pendientes</h5>
	<table border=2>
  <tr>
    <td>CI</td>
    <td>Usuario</td>
	<td>Verificar</td>

  </tr>
<?php
	
	
	$sql="select * from alumnosinformatica where estado='verificado' and matricula='si' and materias='no'";
	$resultado=mysqli_query($conn,$sql);
	
	while ($fila=mysqli_fetch_array($resultado)){
		

		echo "<tr>";
		echo "<td>$fila[1]</td>";
		echo "<td>$fila[2]</td>"."</br>";
?>
	<td>
	<form action="motor.php" method="GET">
		<input type="hidden" value="<?php echo $usuario; ?>" name="nombrec"/>
		<input type="hidden" value="<?php echo $fila[1]; ?>" name="ci"/>
		<input type="hidden" value="F1" name="flujo"/>
		<input type="hidden" value="P8"name="proceso"/>
		<input type="hidden" value="K"name="rol"/>
		<input type="submit" value="Ir a proceso"/>
	</form>
	</td>
<?php
		echo "<td>hola</td>"."</br>";
		echo "</tr>";
	}

	}//final Else

?>
</table>
	
<a href="entradakardex.inc.php" target="cuerpoK">ENTRADA</a></br>
<a href="salidakardex.inc.php" target="cuerpoK">SALIDA</a>
<div class="cuerpoKardex">
      <h4>Actividad</h4>
	  <iframe name="cuerpoK" src="entradakardex.inc.php" width=750 height=400>
	  </iframe>	  	  
	</div>