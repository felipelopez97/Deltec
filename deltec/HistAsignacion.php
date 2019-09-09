<?php 
	include ("Conexion.php");
	$ID_Recurso = $_POST['cod_recurso'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>DELTEC S.A. | Historico de Asignaciones</title>
	<h1>.:: Historico de Asignaciones ::.</h1>
</head>
<body>
	<br>
	<table>
		<tr>
			<td>Fecha Asignacion</td>
			<td>CC Empleado</td>
			<td>Nombre</td>
			<td>Apellidos</td>
		</tr>
		<?php
			$con=conectar();
			$sql = "select h.fecha_asigna, h.id_responsable, p.nombre, p.apellido from hist_asign h, personas p where h.cod_recurso = '$ID_Recurso' and p.identificacion = h.id_responsable order by h.fecha_asigna desc";
			$resultado=mysqli_query ($con, $sql);

			while ($datos=mysqli_fetch_array($resultado)) {				
		?>
			<tr>
				<td><?php echo $datos['fecha_asigna']?></td>
				<td><?php echo $datos['id_responsable']?></td>
				<td><?php echo $datos['nombre']?></td>
				<td><?php echo $datos['apellido']?></td>
			</tr>
		<?php 
			}
		?>
	</table>

</body>
</html>