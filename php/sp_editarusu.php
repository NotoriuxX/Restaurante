<?php
include 'conexion.php';
    $id = $_POST['id'];
    $NOMBRE = $_POST['nombre'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];
    $celular = $_POST['celular'];
    $tipoUsuario = $_POST['tipoUsuario'];
   
    $query = "UPDATE  `usuarios` SET  `id_usu`='$id',`nom_usu`='$NOMBRE', `email_usu`='$email', `direc_usu`='$direccion', `id_tipo`=$tipoUsuario, `celu_usu`='$celular'
                     WHERE id_usu LIKE $id ;";
    $ejecutar = mysqli_query($conexion, $query);                 
    if(!$ejecutar){
        echo "No se Actualizo el usuario!";
    }else{
        header("Location: ../listarusuarios.php");
    }
?>