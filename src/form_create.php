<?php
/*
================================
Este archivo muestra un formulario que
se envía a create_Edificio.php, el cual guardará
los datos
================================
*/
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

<section class="form-register">


		<div class="row">
			<div class="col-12">
				<h1>CREAR USUARIO</h1>
				<form action="create.php" method="POST">


					<div>
						<label for="usuario">Usuario:</label>
						<input class="controls" required name="usuario" type="text" id="usuario" maxlength="20" placeholder="usuario" required>
					</div>
		<br>
					<div>
						<label for="nombre">Nombre:</label>
						<input class="controls" required name="nombre" type="text" id="nombre" maxlength="20" placeholder="Nombre" required>
					</div>
		<br>
					<div>
						<label for="apellido"> Apellido:</label>
						<input class="controls" required name="apellido" type="text" id="apellido" maxlength="20" placeholder="Apellido" required>
					</div>
		
		<br>

					<div>
					<label for="telefono">  Telefono:</label>
					<input class="controls" required name="telefono" type="text" id="telefono" maxlength="12" placeholder="Ingrese Telefono" required>
					</div>


		<br>

					<div>
					<label for="contrasena">  Contrase&ntilde;a :</label>
					<input class="controls" required name="contrasena" type="password" id="contrasena" maxlength="50"  minlength="5" placeholder="Ingrese contraseña (min 5 car)" required>
					</div>

		<br>

					<div>
					<label for="correo_electronico"> Email:</label>
					<input class="controls" required name="correo_electronico" type="text" id="correo_electronico" maxlength="50" placeholder="Email">
					</div>

		<br>

					<div>

					<label for="rol">  Rol :</label>
					<select class="opciones" id = "rol" name = "rol">
						<!-- <option value = "1"> Administrador </option>-->
						<option value = "2"> Usuario </option>
					</select>
			
					</div>
		<br>


					<br>
					<button type="submit">Registrar Usuario</button>
					<br><br>
					<!-- Enlace a listado de Edificios -->
					<a href="../src/index.php">regresar</a>
			   </form>
		    </section>
			</div>
		</div>
	</body>
</html>