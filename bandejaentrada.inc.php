<h1> BANDEJA </h1>

<?PHP

$ci=$_POST["ci"];
$nombre=$_POST["nombrec"];
	include "conexion.inc.php";
	$sqlk="select * from alumnos where ci='$ci'";
	$resultadok=mysqli_query($conn,$sqlk);
	$fila=mysqli_fetch_array($resultadok);
	$cib=$fila['ci'];
	$nombreb=$fila['nombre'];
	echo "";
	echo "Bienvenido:".$nombreb;
	//LISTAR DOCUMENTOS DE ESTUDIANTE
?>
	<table>
  <tr>
	<th>CI</th>
    <th>Nombre</th>

  </tr>
  <tr>
    <td><?php echo $fila['ci'];?></td>
    <td><?php echo $fila['nombre'];?></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
  </tr>
  <tr>
    <td>Vacio</td>
    <td>vacio</td>
  </tr>
</table>
	<h3>Notificaciones de inscripcion:</h3>
<?php
	
	$sql2="select * from alumnosinformatica where ci='$cib'";
	$resultado2=mysqli_query($conn,$sql2);
	$fila2=mysqli_fetch_array($resultado2);
	$estado=$fila2['Estado'];
	//adeemas estas en el proceso 5
	if($estado=='verificado' ){
	
?>
	<h3>Su informacion se ha verificado</h3>
	<form action="motor.php" method="GET">
		<input type="hidden" value="<?php echo $nombreb;?>" name="nombrec"/>
		<input type="hidden" value="<?php echo $cib;?>" name="ci"/>
		<input type="hidden" value="F1" name="flujo"/>
		<input type="hidden" value="P6" name="proceso"/>
		<input type="hidden" value="U" name="rol"/>
		Continuar Inscripcion<input type="submit" name="enviar"/>
		</form>
<?php		
	}
?>	

		



<input name="ci" value="<?php echo $ci;?>" type="hidden" />