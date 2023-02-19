<?php

    include 'conexion.php';

    $nombre_completo = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $celular = $_POST['celular'];
    $password = $_POST['password'];
    $password = hash('sha512', $password);
    $tipoUsuario = $_POST['tipoUsuario'];

    $query = "INSERT INTO usuarios(nom_usu, email_usu, direc_usu, pass_usu, id_tipo, celu_usu ) VALUES('$nombre_completo','$correo', '$direccion', '$password','$tipoUsuario', '$celular')";
    
    //VERIFICA REPETICIONES REPITA
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE email_usu = '$correo' ");
    if(mysqli_num_rows($verificar_correo) > 0){
        echo '
            <script>
                window.location = "../listarusuarios.php";
                alert("Este Correo ya existe");
            </script>
            ';
        exit();
    
    }
    $verificar_celular = mysqli_query($conexion, "SELECT * FROM usuarios WHERE celu_usu = '$celular'");
    if(mysqli_num_rows($verificar_celular) > 0){
        echo '
        <script>
            window.location = "../listarusuarios.php";
            alert("Este celular ya esta registrado intente con otro");
        </script>
        ';
        exit();
    }

    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo'
        <script>
            alert("Usuario Registrado exitosamente");
            window.location = "../listarusuarios.php";
        </script>
        ';

    }else{
        echo'
        <script>
            alert("Intentelo Nuevamente");
            window.location = "../listarusuarios.php";
        </script>
        ';
    }

    mysqli_close($conexion)
?>