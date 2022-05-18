<?php
    print_r($_POST);
    if(empty($_POST["txtProducto"]) || empty($_POST["txtCliente"])){
        header('Location: ../index.php?mensaje=falta');
        exit();
    }

    include '../db/conexion.php';
    $producto = $_POST["txtProducto"];
    $cliente = $_POST["txtCliente"];

    $sentencia = $bd -> prepare("Insert into pedidoscabecera(valor_total, cliente) values (?,?);");
    $resultado = $sentencia -> execute([$producto, $cliente]);

    if($resultado == TRUE){
        header('Location: ../index.php?mensaje=pedidoRegistrado');
    }else{
        header('Location: ../index.php?mensaje=error');
        exit();
    }
?>