<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $nombre = $_POST['txtnombre'];
    $correo = $_POST['txtcorreo'];
    $telefono = $_POST['txttelefono'];

    $sentencia = $bd->prepare("UPDATE empleado SET nombre = ?, correo = ?, telefono = ? where id = ?;");
    $resultado = $sentencia->execute([$nombre, $correo, $telefono,$codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
