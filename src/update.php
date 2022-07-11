<?php
/*
CRUD con PostgreSQL y PHP
================================
Este archivo guarda los datos del formulario
en donde se editan
================================
*/
?>

<?php
#Salir si alguno de los datos no está presente
if (
    !isset($_POST["id"]) ||
    !isset($_POST["tipo_mov"]) ||
    !isset($_POST["material"]) ||
    !isset($_POST["causa"]) ||
    !isset($_POST["afectados"]) ||
    !isset($_POST["observaciones"])
) {
    echo "falta algo";
    exit();
}
#Si todo va bien, se ejecuta esta parte del código...
include_once "configuracion.php";

$id = $_POST["id"];
$tipo_mov = $_POST["tipo_mov"];
$material = $_POST["material"];
$causa = $_POST["causa"];
$afectados = $_POST["afectados"];
$observaciones = $_POST["observaciones"];



$sql = $databasePDO->prepare("UPDATE inventario SET tipo_mov = ?, material = ?, causa = ?, afectados = ?, observaciones = ? WHERE id = ?;");
$resultado = $sql->execute([$tipo_mov, $material, $causa, $afectados, $observaciones, $id]); # Pasar en el mismo orden de los ?


#Si todo salio bien, retornar al form del listado de registos
if ($resultado === true) {
    header("Location: form_read.php");
} else {
    echo "Algo salio mal. Por favor verifica que la tabla exista, así como el ID del registro";
}
