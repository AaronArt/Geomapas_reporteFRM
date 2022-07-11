<?php
/*
CRUD con PostgreSQL y PHP
================================
Este archivo muestra un formulario llenado automáticamente
(a partir del ID pasado por la URL) para editar
================================
 */
 
if (!isset($_GET["id"])) {
    exit();
}

$id = $_GET["id"];
include_once "configuracion.php";

$sql = $databasePDO->prepare("SELECT id,tipo_mov,material,causa,afectados, observaciones FROM inventario WHERE id = ?;");
$sql->execute([$id]);

$inventario = $sql->fetchObject();

if (!$inventario) {
    #No existe
    echo "¡No existe ningun registro con ese ID!";
    exit();
}

#Si existe, se ejecuta esta parte del código
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/Proyecto_final/css/update_style.css">
    <script src="https://kit.fontawesome.com/0458944bda.js" crossorigin="anonymous"></script>
</head>

<body>

		<div>
			<div>

			        <section class="form-register">

							<h1>Actualizar inventario</h1>
							<form action="update.php" method="POST">

								<input class="controls" type="hidden" name="id" value="<?php echo $inventario->id; ?>">

								<div class="form-group">
									<label for="tipo_mov">Tipo de movimiento</label>
									<input class="controls" value="<?php echo $inventario->tipo_mov; ?>" required name="tipo_mov" type="text" id="tipo_mov" placeholder="Tipo de movimiento" >

									<select id="movimiento" name="movimiento" class="opciones">
											<option value="Caida">Caida </option>
											<option value="Volcamiento">Volcamiento </option>
											<option value="Deslizamiento rotacional">Deslizamiento rotacional </option>
											<option value="Deslizamiento translacional">Deslizamiento translacional </option>
											<option value="Flujo">Flujo</option>
											<option value="Complejo">Complejo</option>
									</select> 
								</div>

								<div>
									<label for="material">Material</label>
									<input class="controls" value="<?php echo $inventario->material; ?>" required name="material" type="text" id="material" placeholder="Material">

									<select id="material_" name="material_" class="opciones">
											<option value="Roca">Roca </option>
											<option value="Escombros">Escombros</option>
											<option value="Tierra">Tierra</option>
			       					</select> 
								</div>

								<div>
									<label for="causa">causa</label>
									<input class="controls" value="<?php echo $inventario->causa; ?>" required name="causa" type="text" id="material" placeholder="Causa">

									<select id = "causa_" name="causa_" class="opciones">
											<option value="Lluvias">Lluvias </option>
											<option value="Erosion">Erosion</option>
											<option value="Corte talud">Corte talud</option>
											<option value="Sismo">Sismo</option>
											<option value="Desconocido">Desconocido</option>

									</select>
								</div>

								<div>
									<label for="afectados">afectaciones</label>
									<input class="controls" value="<?php echo $inventario->afectados; ?>" required name="afectados" type="text" id="afectados" placeholder="Afectaciones">

									<select id = "afectados_" name="afectados_" class="opciones">
											<option value = "1"> 1 (Si) </option>
											<option value = "0"> 0 (No) </option>
			    					</select> 
								</div>

								<div>
									<label for="observaciones">observaciones</label>
									<input class="controls" value="<?php echo $inventario->observaciones; ?>" required name="observaciones" type="text" id="observaciones" placeholder="Observaciones">
								</div>

								<br>
								<button type="submit">Actualizar registro</button>
								<br><br>
								<a href="form_update.php">Volver al Listado</a>
							</form>

					</section>
			</div>  
		</div>

</body>