<?php include 'components/header.php'?>

<?php
    include_once "db/conexion.php";
    $sentencia = $bd -> query("select c.id, c.nombre, u.nombre as ciudad, t.nombre as tipo_negocio, ca2.valor_total from cliente c join ciudad u on c.ciudad = u.id join tiponegocios t on c.tipo_negocio = t.id left join (select avg(cu.valor_total) as valor_total, ca.cliente from pedidoscabecera ca join pedidoscuerpo cu on ca.valor_total = cu.id GROUP by ca.cliente) ca2 on c.id = ca2.cliente order by c.id");
    $persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
    
?>

<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-7 mb-5">
     
            <!--fin alerta-->
            <div class="card border border-secondary">
                <div class="card-header bg-info bg-gradient text-dark">
                    Listado de clientes
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">N°</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Ciudad</th>
                                <th scope="col">Tipo de Negocio</th>
                                <th scope="col">Promedio de pedidos</th>
                                <th scope="col" colspan="3">Funciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php
                                $numero = 0;
                                foreach($persona as $dato){
                                $numero ++;
                            ?>

                            <tr>
                                <th scope="row"><?php echo $numero;?></th>
                                <td>
                                    <?php 
                                    echo $dato->nombre;
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                    echo $dato->ciudad;
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                    echo $dato->tipo_negocio;
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        if($dato->valor_total != null){
                                        echo "$".$dato->valor_total;
                                        } else {
                                            echo "$0";
                                            } 
                                    ?>
                                </td>
                                <td>
                                    <a class="text-success" href="resources/editar.php?id=
                                    <?php echo $dato->id; ?>">
                                    <i class="bi bi-brush"></i></a></i></td>
                                <td>
                                    <a onclick="return confirm('¿Seguro de eliminar?')" class="text-danger" href="resources/eliminar.php?id=
                                    <?php echo $dato->id;?>">
                                    <i class="bi bi-trash2"></i></a></i></td>
                                <td>
                                    <a class="text-success" href="pedido.php?id=
                                    <?php echo $dato->id;?>&nombre=<?php echo $dato->nombre;?>">
                                    <i class="bi bi-arrows-angle-contract"></i></a></i></td>
                            </tr>

                            <?php
                                }
                            ?>
                            
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-5">
            <div class="card border border-secondary">
                <div class="card-header bg-info bg-gradient text-dark">
                    Ingreso de datos
                </div>
                <form class="p-4" method="POST" action="resources/registrar.php">
                    <div class="mb-3">
                        <label class="form-label">Cliente: </label>
                        <input type="text" class="form-control" name="txtCliente" autofocus require>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ciudad: </label>
                        <select name="txtCiudad" class="form-select" aria-label="Default select example" require>
                            <option value="" selected>Seleccionar Ciudad</option>
                            <option value="1">Barranquilla</option>
                            <option value="2">Cartagena</option>
                            <option value="3">Santander</option>
                            <option value="4">Medellin</option>
                            <option value="5">Cali</option>
                            <option value="6">Bogota</option>
                            <option value="7">Malambo</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipo de Negocio: </label>
                        <select name="txtNegocio" class="form-select" aria-label="Default select example" require>
                            <option value="" selected>Seleccionar Tipo de Negocio</option>
                            <option value="1">Autonomo</option>
                            <option value="2">Sociedad limitada</option>
                            <option value="3">Sociedad anónima</option>
                            <option value="4">Comunidad de bienes</option>
                            <option value="5">Sociedad laboral</option>
                        </select>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'components/footer.php'?>