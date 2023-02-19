<?php
include 'conexion.php';
    $NOMBRE = $_POST['nombre'];
    $id = $_POST['id'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];
    $celular = $_POST['celular'];
    $Pago = $_POST['Pago'];
    $producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];
   
    $query = "UPDATE `encargos` SET  `nombre` = '$NOMBRE', `correo` = '$email', `direccion` = '$direccion', 
    `celular` = '$celular', `formapago` = '$Pago', `nom_producto` = '$producto', `canti_producto` = '$cantidad', `precio` = '$precio' WHERE `encargos`.`id_pedido` = $id;";

    $ejecutar = mysqli_query($conexion, $query);                 
    if(!$ejecutar){
        echo "No se Actualizo el usuario!";
    }else{
        header("Location: ../listarpedidos.php");
    }
?>