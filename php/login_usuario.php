<?php

    session_start();

    include 'conexion.php';

    $correo = $_POST['correo'];
    $password = $_POST['password'];
    $password = hash('sha512', $password);
    $validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE  email_usu = '$correo' and pass_usu = '$password'");
    $consulta ="SELECT * FROM usuarios WHERE  email_usu = '$correo' and pass_usu = '$password'";
    $ejecutar = $conexion ->query($consulta);
    $row = $ejecutar->fetch_assoc();
    $id = $row['id_usu'];
    $tipo = $row['id_tipo'];
    $_SESSION['usuario'] = $id;

    if(mysqli_num_rows($validar_login) > 0){
        switch($tipo){
            case 2:
                header('location: ../Tienda.php');
                
            break;
                
            case 1:
                
                header('location: ../Listarproducto.php');
            break;

            default:
        
        exit;
            }
    }else{
        if(!isset($usuario)){
          header("location:../login.php");
          session_destroy();
          echo'
        <script>
            alert("Intentelo Nuevamente");
        </script>
        ';
         die();
        }

    }

    
?>