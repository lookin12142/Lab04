<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd->prepare("select * from empleado where id = ?;");
    $sentencia->execute([$codigo]);
    $empleado = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($empleado);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtnombre" required 
                        value="<?php echo $empleado->Nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Correo : </label>
                        <input type="text" class="form-control" name="txtcorreo" autofocus required
                        value="<?php echo $empleado->correo; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telefono: </label>
                        <input type="text" class="form-control" name="txttelefono" autofocus required
                        value="<?php echo $empleado->telefono; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $empleado->id; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>