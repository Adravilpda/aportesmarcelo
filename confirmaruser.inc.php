<h1>CONFIRMAR DATOS</h1>

<?php
include "conexion.inc.php";
	$sqlnot="select * from usuarios where ci='$ci'";
	$resultadonot=mysqli_query($conn,$sqlnot);
	$fila=mysqli_fetch_array($resultadonot);
	$banco=$fila['banco'];
	$cuentabanco=$fila['nrocuenta'];
	echo "Nombre Banco:".$banco."</br>";
	echo "Nro Cuenta:".$cuentabanco."</br>";
	
	


?>