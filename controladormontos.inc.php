<h1>controlador montos</h1>
<?php
$monto=$_GET['montoaporte'];

include "conexion.inc.php";
	$sqlnot="insert into montos values ('','$ci','Aporte','$monto')";
	$resultadonot=mysqli_query($conn,$sqlnot);
	
?>