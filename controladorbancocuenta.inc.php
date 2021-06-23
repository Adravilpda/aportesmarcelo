<h2>controlador bancocuenta</h2>
<?php
$flujo=$_GET["flujo"];//recibe el parametro "nombre" de los datos enviados
$proceso=$_GET["proceso"];
$banco=$_GET["banco"];
$cuentabanco=$_GET["cuentabanco"];
$nombre=$_GET["nombrec"];
$fecha=date("Y").date("m").date("d");

include "conexion.inc.php";
	if(isset($_GET["enviarbanco"])){
		
		$sqlnot="UPDATE `usuarios` SET `banco`='$banco',nrocuenta='$cuentabanco' WHERE ci='$ci'";
		$resultadonot=mysqli_query($conn,$sqlnot);
		
		
		header("Location:http://localhost/aportes/motor.php?flujo=F1&proceso=P1&nombrec=$nombre&rol=U&ci=$ci&aportar=Aportar");
		exit;
		}


?>