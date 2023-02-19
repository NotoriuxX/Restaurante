<?php
session_start();
include 'php/conexion.php';
$usuario = $_SESSION['usuario'];
$consulta ="SELECT * FROM usuarios where id_usu= '$usuario'";

$ejecutar = $conexion ->query($consulta);
$row = $ejecutar->fetch_assoc();	
if(!isset($usuario)){
  header("location:index.php");
  session_destroy();
 die();		
}else{
	switch($row['id_tipo']){
		case 1:
			
		break;
			
		case 2:
			header('location: Tienda.php');
		break;

		default:
	
	exit;
		}
}
$consulta ="SELECT * FROM usuarios ";
$ejecutar = $conexion ->query($consulta);
$row = $ejecutar->fetch_all();
include 'templates/cabecera3.php';
?>

<html>
<body>
    <?php
    $id = $_GET['id'];
    $NOMBRE = $_GET['nombre'];
    $email = $_GET['email'];
    $direccion = $_GET['direccion'];
    $celular = $_GET['celular'];
    $tipoUsuario = $_GET['tipoUsuario'];
    
    ?>
  <div>
	  <form action="php/sp_editarusu.php" method="POST" class="formulario__editar" enctype="multipart/form-data">
                        <h2>Editar</h2>
						<tr>
							<td>ID</td>
                        	<td><input type="text" id="" value="<?=$id?>" name="id" readonly></td>
						</tr>
						<tr>
							<td>Nombre</td>
                        	<td><input type="text" id="" value="<?=$NOMBRE?>" name="nombre"></td>
						</tr>
						<tr>
							<td>Email</td>
                        	<td><input type="text" id="" value="<?=$email?>" name="email"></td>
						</tr>
						<tr>
							<td>Direccion</td>
                        	<td><input type="text" id="" value="<?=$direccion?>" name="direccion"></td>
						</tr>
						<tr>
							<td>Celular</td>
                        	<td><input type="text" id="" value="<?=$celular?>" name="celular"></td>
						</tr>

						<tr>
                        <td>Tipo de Usuarios</td>
                            <?php
                        switch($tipoUsuario){
							case 1:?> <td><input type="radio" id="" name="tipoUsuario" value=1 checked > Administrador<br></td>
                                      <td><input type="radio" id="" name="tipoUsuario" value=2 required> Cliente<br></td>
                             <?php ;
							break;
							case 2:?> <td><input type="radio" id="" name="tipoUsuario" value=1 required> Administrador<br></td>
                                      <td><input type="radio" id="" name="tipoUsuario" value=2  checked> Usuario<br></td><?php ;
							break;
						}
                        ?>
						</tr>
						<td><input	type="submit" value="Editar"></td>
                        <td><a href="listarusuarios.php">Cancelar</a></td>						
        </form>

	   
</div>
</body>
</html>