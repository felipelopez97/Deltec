<html>
<head>
    <title>DELTEC S.A. | Asignar Recursos</title>
</head>
</html>
<?php
	include ("Conexion.php");

	$CodRecurso = $_POST['CodRecurso'];
	$Identificacion = $_POST['Identificacion'];

	$con=conectar();

	$resultado=mysqli_query ($con, "update recursos set id_responsable = '$Identificacion', fecha_asigna = sysdate() where cod_recurso = '$CodRecurso'");
	if ($resultado) {
		$resultado=mysqli_query ($con, "insert into hist_asign (id_responsable, fecha_asigna, cod_recurso) values ('$Identificacion', sysdate(), '$CodRecurso')");
		if ($resultado) {
			echo "<h1>.:: Asignación de Recurso Exitoso ::.</h1>";
			echo "Se ha registrado el recurso " . $CodRecurso;
		}
		else {
			echo "<h1>.:: Asignación de Recurso Fallido ::.</h1>";
			echo "Fallo en el registro (" . mysqli_error($con) . ") ";
		}
	}
	else {
		echo "<h1>.:: Asignación de Recurso Fallido ::.</h1>";
		echo "Fallo en el registro (" . mysqli_error($con) . ") ";
	}
?>
