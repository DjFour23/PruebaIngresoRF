<?php
    if(!isset($_GET['id'])){
        header('Location: ../index.php?mensaje=error');
        exit();
    }

    include '../db/conexion.php';
    $id = $_GET['id'];

    $sentencia = $bd -> prepare("delete from pedidoscabecera where id = ?;");
    $resultado = $sentencia -> execute([$id]);

    if ($resultado === TRUE) {
        header('Location: ../index.php?mensaje=eliminado');
    } else {
        echo "ERROR";
    }
    
?>