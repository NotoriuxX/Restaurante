<?php

    session_start();

    include 'conexion.php';
    $id = $_POST['id'];
    $NOMBRE = $_POST['nombre'];
    $email = $_POST['email'];
    $direccion = $_POST['Direccion'];
    $celular = $_POST['celular'];
    $password = $_POST['password'];
    $password = hash('sha512', $password);

    $consulta ="SELECT * FROM usuarios where id_usu= '$id'";
    $usuario = $_SESSION['usuario'];
    $ejecutar = $conexion ->query($consulta);
    $row = $ejecutar->fetch_assoc();	
    if(!isset($usuario)){
      header("location:index.php");
      session_destroy();
     die();		
    }else{
    	switch($row['id_tipo']){
    		case 1:
                header('location: ../Perfil.php');
    		break;
            
    		case 2:
    			header('location: ../Perfil2.php');
    		break;

    		default:
            
    	exit;
    		}
         }



    
    
    $validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE  id_usu = '$id' and pass_usu = '$password'");

    if(mysqli_num_rows($validar_login) > 0){
        $query = "UPDATE  `usuarios` SET  `nom_usu`='$NOMBRE', `email_usu`='$email', `direc_usu`='$direccion',  `celu_usu`='$celular'
        WHERE id_usu LIKE $id ;";
        $ejecutar = mysqli_query($conexion, $query);                 
        if(!isset($usuario)){
            header("location:index.php");
            session_destroy();
           die();		
          }else{
              switch($row['id_tipo']){
                  case 1:
                      header('location: ../Perfil.php');
                      echo '<p class="alert alert-success agileits" role="alert">Actualzacion realizada correctamente!p>';
                  break;
                  
                  case 2:
                      header('location: ../Perfil2.php');
                      echo '<p class="alert alert-success agileits" role="alert">Actualzacion realizada correctamente!p>';
                  break;
      
                  default:
                  
              exit;
                  }
               }
        exit();
        
        
    }else{
        if(!isset($usuario)){
            header("location:index.php");
            session_destroy();
           die();		
          }else{
              switch($row['id_tipo']){
                  case 1:
                      header('location: ../Perfil.php');
                      echo '<p class="alert alert-success agileits" role="alert">contraseña erronea correctamente!p>';
                  break;
                  
                  case 2:
                      header('location: ../Perfil2.php');
                      echo '<p class="alert alert-success agileits" role="alert">contraseña erronea correctamente!p>';
                  break;
      
                  default:
                  
              exit;
                  }
               }
        exit();
    }

    
?>