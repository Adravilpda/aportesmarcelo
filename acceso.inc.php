<center><div class="header">

<?php include "includes/cabecera.php" ?>
</div></center>
<center>
<form action="accesoexitoso.php" method="GET">
<h3><center>INGRESE SUS DATOS</center></h3>
CI:<input type="text" name="ci"/>
Nombre:<input type="text" name="nombrec"/>
<h2>El ci es obligatorio</h2>
<input type="submit" value="Ingresar" name="loguear">
</form>
<form action="crearcuenta.inc.php" method="GET">
<input type="submit" value="Crear Cuenta" name="crearcuenta">
</form></center>
