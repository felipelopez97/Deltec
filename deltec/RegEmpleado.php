<html>
<head>
    <title>DELTEC S.A. | Registro Empleados</title>
</head>
</html>
<?php
	include ("Conexion.php");

	$Cedula = $_POST['Cedula'];
	$Nombres = $_POST['Nombres'];
	$Apellidos = $_POST['Apellidos'];

	$con=conectar();

	$resultado=mysqli_query ($con, "insert into personas (identificacion, nombre, apellido) values ('$Cedula', '$Nombres', '$Apellidos')");
	if ($resultado) {
		echo "<h1>.:: Registro de Empleado Exitoso ::.</h1>";
		echo "Se ha registrado el empleado " . $Cedula . " - " .$Nombres . " " . $Apellidos;
	}
	else {
		echo "<h1>.:: Registro de Empleado Fallido ::.</h1>";
		echo "Fallo en el registro (" . mysqli_error($con) . ") ";
	}
?>