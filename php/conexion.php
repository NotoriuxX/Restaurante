<?php

    $conexion = mysqli_connect("localhost", "root", "", "restaurant");

    /* condicional para comprobar si se conecta a base de datos
    if($conexion){
        echo 'conectado exitosamente a la base de datos';

    }else{
        echo 'No se a podido conectar a la base de datos';
    }*/ 
    if(mysqli_connect_errno())
{
    printf("Falló conexiónala base de datos:%s\n",mysqli_connect_error());
    exit();
}

?>