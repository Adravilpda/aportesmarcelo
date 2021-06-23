<h1>Igresar Banco y Nro de cuenta desde donde desea transferir</h1>

<?php
	include "conexion.inc.php";
	
		$sql="select * from usuarios where ci=$ci";
		$resultado=mysqli_query($conn,$sql);
		$fila=mysqli_fetch_array($resultado);
		$banco=$fila['banco'];
		$cuenta=$fila['nrocuenta'];
		
	if($banco!=NULL){
	echo "Cuenta Ingresada Correctamente";
	}
?>
</br>
</br>
Nombre Banco<input type="text" value="<?php echo $banco;?>" name="banco"></br>
Nro Cuenta<input type="text" value="<?php echo $cuenta;?>" name="cuentabanco"></br>
<?php
	if($banco!=NULL){
?>
	<input type="submit" value="Enviar" name="enviarbanco" disabled/>
<?php
	}else{
?>
<input type="submit" value="Enviar" name="enviarbanco" >
<?php
}
?>


