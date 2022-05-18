<?php include '../components/header.php'?>

<?php
    if(!isset($_GET['id'])){
        header('Location: ../index.php?mensaje=error');
    }

    include_once '../db/conexion.php';
    $id = $_GET['id'];
    $sentencia = $bd -> prepare("select * from cliente where id = ?;");
    $sentencia -> execute([$id]);
    $persona = $sentencia -> fetch(PDO::FETCH_OBJ);
?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
            <div class="card border border-secondary">
                <div class="card-header bg-info bg-gradient text-dark">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Cliente: </label>
                        <input type="text" class="form-control" name="txtCliente" autofocus require 
                        value="<?php echo $persona->nombre;?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ciudad: </label>
                        <select name="txtCiudad" class="form-select" aria-label="Default select example" require 
                        value="<?php echo $persona->ciudad;?>">
                            <option <?php if($persona->ciudad == "1"){?>selected<?php } ?> value="1">Barranquilla</option>
                            <option <?php if($persona->ciudad == "2"){?>selected<?php } ?> value="2">Cartagena</option>
                            <option <?php if($persona->ciudad == "3"){?>selected<?php } ?> value="3">Santander</option>
                            <option <?php if($persona->ciudad == "4"){?>selected<?php } ?> value="4">Medellin</option>
                            <option <?php if($persona->ciudad == "5"){?>selected<?php } ?> value="5">Cali</option>
                            <option <?php if($persona->ciudad == "6"){?>selected<?php } ?> value="6">Bogota</option>
                            <option <?php if($persona->ciudad == "6"){?>selected<?php } ?> value="7">Malambo</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipo de Negocio: </label>
                        <select name="txtNegocio" class="form-select" aria-label="Default select example" require>
                            <option <?php if($persona->tipo_negocio == "1"){?>selected<?php } ?> value="1">Autonomo</option>
                            <option <?php if($persona->tipo_negocio == "2"){?>selected<?php } ?> value="2">Sociedad limitada</option>
                            <option <?php if($persona->tipo_negocio == "3"){?>selected<?php } ?> value="3">Sociedad anónima</option>
                            <option <?php if($persona->tipo_negocio == "4"){?>selected<?php } ?> value="4">Comunidad de bienes</option>
                            <option <?php if($persona->tipo_negocio == "4"){?>selected<?php } ?> value="5">Sociedad laboral</option>
                        </select>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="id" value="<?php echo $persona->id;?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>

<?php include '../components/footer.php'?>