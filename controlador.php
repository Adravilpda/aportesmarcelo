<?php
$flujo=$_GET["flujo"];//recibe el parametro "nombre" de los datos enviados
$proceso=$_GET["proceso"];
$rol=$_GET["rol"];
$ci=$_GET["ci"];
$usuario=$_GET["nombrec"];  //recibiendo nombre usuario
$procesoSiguiente=$_GET["procesoSiguiente"];// del anterior form
$archivo=$_GET["archivo"];
if(isset($_GET["bandejaE"])){
	include "controladorbandejaentrada.inc.php";
	header("Location:http://localhost/workflow2/acceso.inc.php");
	exit;
}
  //archivo de guardar datos en BD
//$sql="select * from flujoproceso where flujo='$flujo' and proceso='P4'";
if($procesoSiguiente=='IF'){//F1 P5   P6
	//usa la condicion del archivo incluido
	//$sql="select * from flujoproceso where flujo='$flujo' and proceso='P5'";
	}// F1 P6  P7
else{
	if(isset($_GET["Anterior"]))
	{//F1    P4   IF
	$sql="select * from flujoproceso where flujo='$flujo' and procesosiguiente='$proceso'";
	}
	if(isset($_GET["Siguiente"]))
	{
	$sql="select * from flujoproceso where flujo='$flujo' and proceso='$procesoSiguiente'";
	}
}
//if($procesoSiguiente=='FIN'){
//	header("Location:http://localhost/workflow2/bandejakardex.inc.php");
//	exit;
//}
	if(isset($_GET["Finalizar"]))
	{//F1    P4   IF
	header("Location:http://localhost/workflow2/alumnoVerificado.inc.php?user=$usuario");
	exit;
	}
include "controlador".$archivo;
include "conexion.inc.php";
$resultado=mysqli_query($conn,$sql);
$fila=mysqli_fetch_array($resultado);
$procesoEnvia=$fila['proceso'];

$archivoEnvia="motor.php?flujo=".$flujo."&proceso=".$procesoEnvia."&nombrec=".$usuario."&rol=".$rol."&ci=".$ci;
header("Location:".$archivoEnvia);



?>
