<?php
    print_r($_POST);
    if(!isset($_POST['id'])){
        header('Location: ../index.php?mensaje=error');
    }
    include '../db/conexion.php';
    $id = $_POST['id'];
    $cliente = $_POST['txtCliente'];
    $ciudad = $_POST['txtCiudad'];
    $negocio = $_POST['txtNegocio'];

    $sentencia = $bd -> prepare("update cliente set nombre = ?, ciudad = ?, tipo_negocio = ? where id = ?;");
    $resultado = $sentencia -> execute([$cliente, $ciudad, $negocio, $id]);

    if ($resultado == TRUE) {
        header('Location: ../index.php?mensaje=editado');
    } else {
        header('Location: ../index.php?mensaje=error');
        exit();
    }
    
?>