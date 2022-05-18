<?php
    print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtCliente"]) || empty($_POST["txtCiudad"]) || empty($_POST["txtNegocio"])){
        header('Location: ../index.php?mensaje=falta');
        exit();
    }

    include '../db/conexion.php';
    $cliente = $_POST["txtCliente"];
    $ciudad = $_POST["txtCiudad"];
    $negocio = $_POST["txtNegocio"];

    $sentencia = $bd -> prepare("Insert into cliente(nombre, ciudad, tipo_negocio) values (?,?,?);");
    $resultado = $sentencia -> execute([$cliente, $ciudad, $negocio]);

    if($resultado == TRUE){
        header('Location: ../index.php?mensaje=registrado');
    }else{
        header('Location: ../index.php?mensaje=error');
        exit();
    }
?>