
<?php
SESSION_START();
//$UsuarioG=$_SESSION['UsuarioG'];
$nom=$_SESSION['usuariog'];
$rolg=$_SESSION['rolg'];
$cig=$_SESSION['cig'];

	include "conexion.inc.php";
	
	if($rolg=='A'){
		$sql="select * from seguimiento order by proceso";
		$resultado=mysqli_query($conn,$sql);
	?>
<table border=2>
	<tr>
		<td>Usuario</td>
		<td>Ci</td>
		<td>Codigo Inscripcion</td>
		<td>Flujo</td>
		<td>Proceso</td>
		<td>NroTramite</td>
		<td>Fecha Inicio</td>
		<td>Fecha Fin</td>
		<td>Administrar</td>
	</tr>
<?php	
	
	while ($fila=mysqli_fetch_array($resultado)){
		

		echo "<tr>";
		echo "<td>$fila[0]</td>";
		echo "<td>$fila[1]</td>";
		echo "<td>$fila[2]</td>";
		echo "<td>$fila[3]</td>";
		echo "<td>$fila[4]</td>";
		echo "<td>$fila[5]</td>";
		echo "<td>$fila[6]</td>";
		if($fila[7]!='0000-00-00'){
			echo "<td>$fila[7]</td>";
		}else{echo "<td><center>-</center></td>";}
		
		
		$sqlvisto="UPDATE bandejaalumno SET visto='si' where receptor='$fila[1]' and remitente='$fila[0]'";
		$resultadovisto=mysqli_query($conn,$sqlvisto);
?>
	<td>
	<form action="motor.php" method="GET">
		<input type="hidden" value="<?php echo $nom; ?>" name="nombrec"/>
		<input type="hidden" value="<?php echo $fila['ci']; ?>" name="ci"/>
		<input type="hidden" value="<?php echo $fila['flujo'];?>" name="flujo"/>
		<input type="hidden" value="<?php echo $fila['proceso'];?>"name="proceso"/>
		<input type="hidden" value="K"name="rol"/>
		<input type="submit" value="Ir a proceso"/>
	</form>
	</td>
<?php
		
		echo "</tr>";
		}

?>
</tr>
</table>
<?php
}else{//BANDEJA USUARIO
		$sql1="select * from bandeja where receptor='$cig' and remitente!='$nom' order by fecha";
		$resultado1=mysqli_query($conn,$sql1);
		
		$sql2="select * from seguimiento where ci='$cig'";
		$resultado2=mysqli_query($conn,$sql2);
		$fila2=mysqli_fetch_array($resultado2);
		$flujo=$fila2['flujo'];
		$proceso=$fila2['proceso'];
		$tramite=$fila2['tramite'];
	
?>
<table border=2>
	<tr>
		<td>Destino</td>
		<td>Remitente</td>
		<td>Asunto</td>
		<td>FechaEnvio</td>
		
		<td>Proceso</td></br>
<?php	
	while ($fila1=mysqli_fetch_array($resultado1)){
		

		echo "<tr>";
		echo "<td>$fila1[1]</td>";
		echo "<td>$fila1[2]</td>";
		echo "<td>$fila1[3]</td>";
		echo "<td>$fila1[4]</td>";
		
		$sqlvistou="UPDATE bandeja SET visto='si' where receptor='$fila1[1]' and remitente='$fila1[2]'";
		$resultadovistou=mysqli_query($conn,$sqlvistou);
?>
	<td>
	<form action="motor.php" method="GET">
		<input type="hidden" value="<?php echo $nom; ?>" name="nombrec"/>
		<input type="hidden" value="<?php echo $fila1['receptor']; ?>" name="ci"/>
		<input type="hidden" value="<?php echo $flujo;?>" name="flujo"/>
		<input type="hidden" value="<?php echo $proceso;?>"name="proceso"/>
		<input type="hidden" value="U"name="rol"/>
		<input type="submit" value="Ir a proceso"/>
	</form>
	</td>
<?php
		
		echo "</tr>";
		}

?>
</table>
<?php

}//fin ELSE
?>