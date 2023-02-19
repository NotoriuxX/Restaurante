<?php
include 'conexion.php';
    $id = $_GET['id'];
    $query = "DELETE FROM `encargos`  WHERE id_pedido LIKE $id ;";
    $ejecutar = mysqli_query($conexion, $query);                 
    if(!$ejecutar){
        echo "No se Elimino pedido!";
    }else{
        header("Location: ../listarpedidos.php");
    }
?>