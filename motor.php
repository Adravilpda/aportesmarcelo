<html>

<?php
$flujo=$_GET["flujo"];
$proceso=$_GET["proceso"];
$usuario=$_GET["nombrec"];//USUARIO GENERAL
$ci=$_GET["ci"];

echo "<h3>"."BIENVENIDO: ".$usuario."</h3>";
include "conexion.inc.php";
$sql="select * from flujoproceso where flujo='$flujo' and proceso='$proceso'";
$resultado=mysqli_query($conn,$sql);
$fila=mysqli_fetch_array($resultado);
$procesoSiguiente=$fila['procesosiguiente'];
$rolCuenta=$fila['rol'];
$archivo=$fila['formulario'];
echo "PROCACTUAL:".$proceso."</br>";
echo "PROCSIG:".$procesoSiguiente."</br>";
//echo "ROLCORRESPONDIENTE:".$rolCuenta."</br>";
//echo "CI ADMINISTRADOR:".$ci."</br>";
$sqlrol="select rol from cuentas where usuario='$usuario'";
$resultadorol=mysqli_query($conn,$sqlrol);
$filarol=mysqli_fetch_array($resultadorol);
$rolUsuario=$filarol['rol'];
echo "ROL DEL USUARIO ACTUAL:".$rolUsuario;
?>
<body>
<h3>PROCESO DE APORTES</h3>
<form action="controlador.php" method="GET" enctype="multipart/form-data">
<?php

include $archivo; //pantalla actual
?>
<br/>
<input type="hidden" value="<?php echo $flujo;?>" name="flujo"/>
<input type="hidden" value="<?php echo $proceso;?>" name="proceso"/>
<input type="hidden" value="<?php echo $rolUsuario;?>" name="rol"/>
<input type="hidden" value="<?php echo $procesoSiguiente;?>" name="procesoSiguiente"/>
<input type="hidden" value="<?php echo $usuario;?>" name="nombrec"/>
<input type="hidden" value="<?php echo $ci;?>" name="ci"/>
<input type="hidden" value="<?php echo $archivo;?>" name="archivo"/>
<center>
<?php
	if($rolUsuario!=$rolCuenta){
		if($procesoSiguiente=='FIN'){
			
?>			
			
			<input type="submit" value="Finalizar "name="Finalizar"/>
			

<?php		
		}
		else{
?>		

		<input type="submit" value="Ir Bandeja Entrada" name="bandejaE"/>
<?php
		}
?>
	
<?php
	}else{
		if($proceso=='P9'){
		
			}
			else{
?>
				<input type="submit" value="Anterior" name="Anterior"/>
			<input type="submit" value="Siguiente" name="Siguiente"/>
<?php			
			}
?>
			
			
<?php
	}
?>

</form>

</body>
</html>