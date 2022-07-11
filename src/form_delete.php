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
	$sql = $databasePDO->query("SELECT id, tipo_mov, material, causa, fecha_registro FROM inventario");
	$resultados = $sql->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lectura registros</title>

	<link rel="stylesheet" href="/Proyecto_final/css/tabla.css">
</head>
<body>
<div id="main-container">


  <div class="row">
	<div class="col-12">
		<h1 style="color:white">Listado de Registros</h1>
		<br>
		<div>
			<table border="1">
				<thead>
					<tr>
						<th>ID</th>
						<th>Tipo Movimiento</th>
						<th>Material</th>
						<th>Causa</th>
						<th>Fecha de Registro</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($resultados as $inventario){ ?>
						<tr>
							<td><?php echo $inventario->id ?></td>
							<td><?php echo $inventario->tipo_mov ?></td>
							<td><?php echo $inventario->material?></td>
							<td><?php echo $inventario->causa?></td>
							<td><?php echo $inventario->fecha_registro?></td>
							<td><a href="<?php echo "delete.php?id=" . $inventario->id?>">Eliminar 🗑️</a></td>
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
<a href="/Proyecto_final/src/pagina_protegida.php?logueado=si">Volver a geovisor</a>
