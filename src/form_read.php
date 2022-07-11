<?php
/*
CRUD con PostgreSQL y PHP
================================
Este archivo lista todos los
datos de la tabla, obteniendo a
los mismos como un arreglo
================================
*/
?>

<?php
	include_once "configuracion.php";
	$sql = $databasePDO->query("SELECT * FROM inventario");
	$resultados = $sql->fetchAll(PDO::FETCH_OBJ);
?>

<!------------------------------------------------------------------------------------   -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lectura registros</title>

	<link rel="stylesheet" href="/Proyecto_final/css/tabla.css">
</head>
<body>
	<div id="main-container">

		
			<div>
				<h1 style="color:white;"> Listado de inventario</h1>
				<br>
				<div>
					<table border="1">
						<thead>
							<tr>
								<th>ID</th>
								<th>Latitud</th>
								<th>Longitud</th>
								<th>Tipo movimiento</th>
								<th>Materiales</th>
								<th>Causa</th>
								<th>Fecha</th>
								<th>Afectados</th>
								<th>Amenaza</th>
								<th>Formacion geologica Sup</th>
								<th>Localizacion</th>
								<th>Distancia mas corta</th>
								<th>Centro Poblado mas cercano</th>
								<th>Observaciones</th>
		
							</tr>
						</thead>
						<tbody>
							<?php foreach($resultados as $inventario){ ?>
								<tr>
									<td><?php echo $inventario->id ?></td>
									<td><?php echo $inventario->x ?></td>
									<td><?php echo $inventario->y ?></td>
									<td><?php echo $inventario->tipo_mov ?></td>
									<td><?php echo $inventario->material ?></td>
									<td><?php echo $inventario->causa ?></td>
									<td><?php echo $inventario->fecha_registro ?></td>
									<td><?php echo $inventario->afectados ?></td>
									<td><?php echo $inventario->nivel_amz ?></td>
									<td><?php echo $inventario->fgs ?></td>
									<td><?php echo $inventario->localizacion ?></td>
									<td><?php echo $inventario->dist_cpob ?></td>
									<td><?php echo $inventario->centro_pob ?></td>
									<td><?php echo $inventario->observaciones ?></td>
		
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
</body>
</html>

<br>
<a href="/Proyecto_final/src/pagina_protegida.php?logueado=si">Volver al Geovisor</a>
