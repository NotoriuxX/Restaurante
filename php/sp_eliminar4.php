<?php
include 'conexion.php';
    $id = $_GET['id'];
    $query = "DELETE FROM `recervas`  WHERE id LIKE $id ;";
    $ejecutar = mysqli_query($conexion, $query);                 
    if(!$ejecutar){
        echo "No se Elimino Recerva!";
    }else{
        header("Location: ../listarpedidos.php");
    }
?>