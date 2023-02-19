<?php
include 'conexion.php';
    $id = $_GET['id'];
    $query = "DELETE FROM `usuarios`  WHERE id_usu LIKE $id ;";
    $ejecutar = mysqli_query($conexion, $query);                 
    if(!$ejecutar){
        echo "No se Elimino producto!";
    }else{
        header("Location: ../listarusuarios.php");
    }
?>