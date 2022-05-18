<?php include 'components/header.php'?>

<?php
    include_once "db/conexion.php";
    $id = $_GET['id'];
    $sentencia = $bd -> prepare("select ca.id, cl.nombre, cu.nombre as producto, cu.valor_total FROM pedidoscabecera ca JOIN cliente cl on ca.cliente = cl.id JOIN pedidoscuerpo cu on ca.valor_total = cu.id where ca.cliente = ?");
    $sentencia -> execute([$id]);
    $persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-7 mb-5">
            <div class="card border border-secondary">
                <div class="card-header bg-info bg-gradient text-dark">
                    Pedidos por cliente
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">N°</th>
                                <th scope="col">Nombre cliente</th>
                                <th scope="col">Producto</th>
                                <th scope="col">Valor</th>
                                <th scope="col" colspan="1">Funciones</th>
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
                                <td><?php echo $dato->nombre;?></td>
                                <td><?php echo $dato->producto;?></td>
                                <td><?php echo "$".$dato->valor_total;?></td>
                                <td><a onclick="return confirm('Estas seguro de eliminar?')" class="text-danger" href="resources/eliminarPedido.php?id=<?php echo $dato->id;?>"><i class="bi bi-trash"></i></a></i></td>
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
                    Crear pedido
                </div>
                <form class="p-4" method="POST" action="resources/registrarPedido.php">
                    <div class="mb-3">
                        <label class="form-label">Cliente: </label>
                        <input type="text" class="form-control" name="txtnombre" autofocus require readonly value="<?php echo $_GET['nombre'] ?>">
                        <input type="hidden" name="txtCliente" autofocus value="<?php echo $_GET['id'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Producto: </label>
                        <select name="txtProducto" class="form-select" aria-label="Default select example" require>
                            <option value="" selected>Seleccionar Producto</option>
                            <option value="1">Crispetas Grandes - $15000</option>
                            <option value="1">Crispetas Medianas - $10000</option>
                            <option value="1">Crispetas Pequeñas - $7000</option>
                            <option value="2">Gaseosa - $2500</option>
                            <option value="3">HotDog - $3500</option>
                            <option value="4">Agua - $2000</option>
                            <option value="5">Chocolate - $5000</option>
                        </select>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Crear">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'components/footer.php'?>