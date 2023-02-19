<?php
include 'conexion.php';

    $NOMBRE = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $cantidad_de_Personas = $_POST['cantidad_de_Personas'];
    $mensajes = $_POST['mensajes'];

    
    $query = "INSERT INTO `recervas` (`id`, `nombre`, `email`, `telefono`, `fecha`, `hora`, `cantidad_de_Personas`, `mensajes`) VALUES (NULL, '$NOMBRE', '$email', '$telefono', '$fecha', '$hora', '$cantidad_de_Personas', '$mensajes');";
                     
    $ejecutar = mysqli_query($conexion, $query);  
    if(!$ejecutar){
        echo "No se agrego la recerva!";
    }else{
        header("Location: ../index.php");
    }
?>