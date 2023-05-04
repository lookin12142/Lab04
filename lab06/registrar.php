<?php
//print_r($_POST);
if (empty($_POST["txtnombre"]) || empty($_POST["txtcorreo"]) || empty($_POST["txttelefono"])) {
    header('Location: index.php?mensaje=falta');
    exit();
}

include_once 'model/conexion.php';
$nombre = $_POST['txtnombre'];
$correo = $_POST['txtcorreo'];
$telefono = $_POST['txttelefono'];

$sentencia = $bd->prepare("INSERT INTO empleado(Nombre,correo,telefono) VALUES (?,?,?);");
$resultado = $sentencia->execute([$nombre, $correo, $telefono]);

if ($resultado === TRUE) {
    header('Location: index.php?mensaje=registrado');
} else {
    header('Location: index.php?mensaje=error');
    exit();
}

