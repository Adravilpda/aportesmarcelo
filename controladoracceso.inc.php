<?php

$nombre=$_GET["nombre"];
$_SESSION["usuario"]=$nombre;
include "conexion.inc.php";
$sql="select * from alumnos where nombre like '".$_SESSION["usuario"]."'";
$resultado=mysqli_query($conn,$sql);

while($fila=mysqli_fetch_array($resultado))
{
echo $fila[0];
}
?>