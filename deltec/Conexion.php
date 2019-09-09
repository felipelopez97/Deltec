<?php

function conectar() {
	$usuario="root";
	$clave="";
	$servidor="localhost";
	$bd="deltec";
	$conexion=mysqli_connect($servidor, $usuario, $clave) or die("Fallo de conexión ".mysql_error());
	mysqli_select_db($conexion, $bd);
	return $conexion;
}

?>