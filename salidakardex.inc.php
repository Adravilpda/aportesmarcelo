
<?php
SESSION_START();
//$UsuarioG=$_SESSION['UsuarioG'];
$nom=$_SESSION['usuariog'];
$rolg=$_SESSION['rolg'];
$cig=$_SESSION['cig'];
	include "conexion.inc.php";
	$sql="select * from bandeja where remitente='$nom' order by fecha desc";
	$resultado=mysqli_query($conn,$sql);
	if($rolg=='A'){

?>
<table border=2>
	<tr>
		<td width=100>CI Estudiante</td>
		<td width=200>Remitente</td>
		<td width=400>Asunto</td>
		<td>FechaEnvio</td>
		<td>Visto</td>
		
		
<?php	
	while ($fila=mysqli_fetch_array($resultado)){
		

		echo "<tr>";
		echo "<td>$fila[1]</td>";
		echo "<td>$fila[2]</td>";
		echo "<td>$fila[3]</td>";
		echo "<td>$fila[4]</td>";
		echo "<td>$fila[5]</td>";
?>
	
<?php
		
		echo "</tr>";
		}
?>
</table>
<?php
}else{
?>
<table border=2>
	<tr>
		
		<td>Remitente</td>
		<td>Asunto</td>
		<td>FechaEnvio</td>
		<td>Visto</td>
		
<?php	
	while ($fila=mysqli_fetch_array($resultado)){
		

		echo "<tr>";
		
		echo "<td>$fila[2]</td>";
		echo "<td>$fila[3]</td>";
		echo "<td>$fila[4]</td>";
		echo "<td>$fila[5]</td>"."</br>";
?>
	<td>
	
	</td>
<?php
		
		echo "</tr>";
		}
?>
</table>
<?php
	}
?>