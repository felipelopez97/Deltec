<html>
<head>
    <title>DELTEC S.A. | Registro Recursos</title>
</head>
</html>
<?php
	include ("Conexion.php");

	$CodRecurso = $_POST['CodRecurso'];
	$NomRecurso = $_POST['NomRecurso'];
	$MarcaRecurso = $_POST['MarcaRecurso'];
	$CatRecurso = $_POST['CatRecurso'];
	$NumSerie = $_POST['NumSerie'];


	$con=conectar();

	$resultado=mysqli_query ($con, "insert into recursos (cod_recurso, nombre, marca,categoria,serie, fecha_asigna, id_responsable) values ('$CodRecurso', '$NomRecurso', '$MarcaRecurso','$CatRecurso','$NumSerie', sysdate(), '1')");
	if ($resultado) {

		$resultado=mysqli_query ($con, "insert into hist_asign (id_responsable, fecha_asigna, cod_recurso) values ('1', sysdate(), '$CodRecurso')");

		echo "<h1>.:: Registro de Recurso Exitoso ::.</h1>";
		echo "Se ha registrado el recurso " . $CodRecurso;
	}
	else {
		echo "<h1>.:: Registro de Recurso Fallido ::.</h1>";
		echo "Fallo en el registro (" . mysqli_error($con) . ") ";
	}
?>
