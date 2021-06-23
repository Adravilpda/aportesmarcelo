<?php

include "conexion.inc.php";

	$sql="UPDATE `alumnos` SET `bandeja`='si' WHERE ci='$ci'";
	
	$resultado=mysqli_query($conn,$sql);

?>