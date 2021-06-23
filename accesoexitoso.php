<center><div class="header">

<?php include "includes/cabecera.php" ?>
</div></center>
<center>
<h4>Comprobando Acceso</h4>
<?php
SESSION_START();


$usuario=$_GET["nombrec"];
$ci=$_GET["ci"];
$_SESSION['usuariog']=$usuario;
$_SESSION['cig']=$ci;
	if($ci==NULL){
		header("Location:http://localhost/aportes/acceso.inc.php");
		exit;
	}
	include "conexion.inc.php";
	$sql="select * from cuentas where ci='$ci'";
	$resultado=mysqli_query($conn,$sql);
	$fila=mysqli_fetch_array($resultado);
	$userx=$fila['usuario'];
	$cix=$fila['ci'];

	//validacion cuenta
	if($usuario==$userx && $ci==$cix){
	echo "Su usuario es: ".$userx;
	$sqlBandeja="select * from cuentas where ci='$ci'";
	$resultadoB=mysqli_query($conn,$sqlBandeja);
	$filaB=mysqli_fetch_array($resultadoB);
	$bandejaON=$fila['bandeja'];
	$rol=$fila['rol'];
$_SESSION['rolg']=$rol;
		if($bandejaON=='no'){
	
	
		?>
	
		<form action="motor.php" method="GET">
		<input type="hidden" value="<?php echo $usuario;?>" name="nombrec"/>
		<input type="hidden" value="<?php echo $ci;?>" name="ci"/>
		<input type="hidden" value="F1" name="flujo"/>
		<input type="hidden" value="P3" name="proceso"/>
		<input type="hidden" value="<?php echo $rol?>;" name="rol"/>
		<input type="submit" value="Aceptar" name="enviar"/>
		</form>
<?php
		}else{
?>
		<form action="bandejakardex.inc.php" method="POST">
		<input type="hidden" value="<?php echo $usuario;?>" name="nombrec"/>
		<input type="hidden" value="<?php echo $ci;?>" name="ci"/>
		<input type="hidden" value="<?php echo $rol;?>" name="rol"/>
		<input type="submit" value="Aceptar" name="enviar"/>
		</form>
<?php
		}
	}
	else{
	echo "No se encuentra esa cuenta"."</br>";
	echo "Escriba los datos correctos"."</br>";
	echo "<form action=acceso.inc.php method=POST>";
	echo "<input type=submit name=enviar/>";
	echo "</form>";
	}

?>
	



