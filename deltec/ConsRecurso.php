<?php 
	include ("Conexion.php");
	$Identificacion = $_POST['Identificacion'];
	$con=conectar();
?>
<!DOCTYPE html>
<html>
<head>
	<title>DELTEC S.A. | Consulta Recursos</title>
	<h1>.:: Consulta de Recursos Asignados ::.</h1>
</head>
<body>
	<?php
		$sql = "select * from personas where Identificacion = '$Identificacion'";
		$resultado=mysqli_query ($con, $sql);
		$datos=mysqli_fetch_array($resultado);
	?>
	<h4><?php echo "Nombre: " . $datos['nombre'] . " " . $datos['apellido'] ?></h4>
	<table>
		<tr>
			<td>ID Recurso</td>
			<td>Categoria</td>
			<td>Nombre</td>
			<td>Marca</td>
			<td>Serie</td>
			<td>Fecha Asignacion</td>
		</tr>
		<?php
			
			$sql = "select cod_recurso, categoria, nombre, marca, serie, fecha_asigna from recursos where id_responsable = '$Identificacion'";
			$resultado=mysqli_query ($con, $sql);

			while ($datos=mysqli_fetch_array($resultado)) {				
		?>
			<tr>
				<td><?php echo $datos['cod_recurso']?></td>
				<td><?php echo $datos['categoria']?></td>
				<td><?php echo $datos['nombre']?></td>
				<td><?php echo $datos['marca']?></td>
				<td><?php echo $datos['serie']?></td>
				<td><?php echo $datos['fecha_asigna']?></td>
			</tr>
		<?php 
			}
		?>
	</table>

</body>
</html>