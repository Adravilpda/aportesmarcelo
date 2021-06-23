<?php
$ci=$_GET["ci"];
$nombre=$_GET["nombre"];

$rol='U';
$bandeja='si';
$saldo=0;
$banco='';
$nrocuenta='';
if($ci==NULL || $nombre==NULL){
	echo "<script>alert('No se guardan datos vacios');</script>";
	header("Location:crearcuenta.inc.php");
}
else{
	include "conexion.inc.php";
	$sql="insert into cuentas values ('','$ci','$nombre','$rol','$bandeja')";
	$resultado=mysqli_query($conn,$sql);
	
	$sql="insert into usuarios values ('','$ci','$nombre','$saldo','$banco','$nrocuenta')";
	$resultado=mysqli_query($conn,$sql);
}
header("Location:acceso.inc.php");


?>