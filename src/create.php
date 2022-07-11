<?php
/*
CRUD con PostgreSQL y PHP
================================
Este archivo inserta los datos 
enviados a través de formulario.php
================================
*/
?>
<?php
#Salir si alguno de los datos no está presente
if (!isset($_POST["usuario"]) || !isset($_POST["nombre"]) || !isset($_POST["apellido"])) {
    echo ("esta mal todo");
    exit();
}
#Si todo va bien, se ejecuta esta parte del código...
include_once "configuracion.php";   #conecta a la BD configurara en ese archivo php

$usuario = $_POST["usuario"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$telefono = $_POST["telefono"];
$contrasena = $_POST["contrasena"];
$correo_electronico = $_POST["correo_electronico"];
$id_rol = $_POST["rol"];


$contrasena_encriptada = md5($contrasena);


//function phpAlert($msg) {
   // echo '<script type="text/javascript">alert("' . $msg . '")</script>';
//}





$sql = $databasePDO->prepare("INSERT INTO usuarios(usuario, nombre, apellido, telefono, contrasena, correo, id_rol) VALUES (?, ?, ?, ?, ?, ?, ?);");
$resultado = $sql->execute([$usuario, $nombre, $apellido, $telefono, $contrasena_encriptada , $correo_electronico, $id_rol]); # Pasar en el mismo orden de los ?
#execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario.
#Con eso podemos evaluar
if ($resultado === true) {
    # Redireccionar a la lista
    //phpAlert(   "Usuario registrado exitosamente"   );

    echo'<script type="text/javascript">
    alert("Registrado exitosamente");
    window.location.href="index.php";
    </script>';

	//header("Location: index.php");
} else {
    echo "Algo salio mal. Por favor verifica que la tabla exista";
}
