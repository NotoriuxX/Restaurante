<?php
include 'conexion.php';
    $id = $_GET['id'];
    $query = "DELETE FROM `productos`  WHERE id_pro LIKE $id ;";
    $ejecutar = mysqli_query($conexion, $query);                 
    if(!$ejecutar){
        echo "No se Elimino producto!";
    }else{
        header("Location: ../Listarproducto.php");
    }
?>