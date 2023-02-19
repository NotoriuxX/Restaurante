<?php

session_start();
include 'php/conexion.php';

$usuario = $_SESSION['usuario'];
if(!isset($usuario)){
  header("location:index.php");
  session_destroy();
 die();
}

$consulta ="SELECT * FROM usuarios where id_usu= '$usuario'";
$ejecutar = $conexion ->query($consulta);
$row = $ejecutar->fetch_assoc();

switch($row['id_tipo']){
  case 1:
  break;
      
  case 2:
    header('location: Perfil2.php');
  break;

  default:
    header('location: Tienda.php');
exit;
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/boos.css">
  <link rel="stylesheet" type="text/css" href="CSS/PerfilCli.css">
  <link href="css/bootstrap.css" media="all" type="text/css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Perfil</title>
</head>
<body>
    <header>
      <nav class="nav  nav-fill">
          <a class="nav-link" href="php/cerrar_sesion.php">Cerrar sesión </a>
          <a class="nav-link active" aria-current="page" href="index.php">Volver Inicio</a>
          <a href="index.php" style="height: 66px;width: 234px;margin: -9px 21px 2px 5px;text-align: center;"> <img src="IMG/logo1.png"  alt="logo" class="img_logo"/></a>
          <a class="nav-link" href="Tienda.php">Menu</a>
          <a class="nav-link active" aria-current="page" href="Listarproducto.php">Administracion</a>
          <a class="nav-link" href="#"><i class="bi bi-person-circle"></i></a>
        </nav>
  </header>

  <div class="contenedor">
    <h1>Perfil de <?php echo $row['nom_usu']?> </h1>
    <form action="php/editar_usuario.php" method="POST"  id="formulario">
      <!-- Lista de campos -->
      <ul>
        <input type="hidden" id="nombre" name="id" maxlength="30" size="30" value="<?php echo $usuario?>" required="" autofocus="autofocus" />
        <li class="fila">
          <!-- text -->
          <input type="text" id="nombre" name="nombre" maxlength="30" size="30" value="<?php echo $row['nom_usu']?>" required="" autofocus="autofocus" />
          <label for="nombre" class="propiedad">Nombre</label>
        </li>
        <!-- password -->
        <li class="fila">
          <input type="password" id="password" name="password" size="20" value="" style="width: 314.8px;" />
          <label for="password" class="propiedad">Contraseña</label>
        </li>
        <!-- email -->
        <li class="fila">
          <input type="email" id="email" name="email" maxlength="30" size="30"  value="<?php echo $row['email_usu']?>" />
          <label for="email" class="propiedad">Email</label>
        </li>
        <!-- tel -->
        <li class="fila">
          <input type="tel" id="celular" name="celular" maxlength="9" size="11" value="<?php echo $row['celu_usu']?>" pattern="[0-9]{9}" style="width: 314.8px;"/>
          <label for="telefono" class="propiedad">Celular</label>
          </li>
        <li class="fila">
          <input type="dir" id="Direccion" name="Direccion"  size="30" value="<?php echo $row['direc_usu']?>"  />
          <label for="direction" class="propiedad">Direccion</label>
        </li>
        <!-- Botonera -->
        <li class="fila botonera">
           <td><a href="Tienda.php">Cancelar</a></td>
          <button >Editar</button>   
        </li>
      </ul>
    </form>
  </div>
                
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
<script src="js/bootstrap.bundle.js"></script>
<script src="js/funcionLogin.js"></script>
</body>
</html>