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
    $Pago = $_GET['Pago'];
	$producto = $_GET['producto'];
    $cantidad = $_GET['cantidad'];
    $precio = $_GET['precio'];
    ?>
  <div>
	  <form action="php/sp_editarpedido.php" method="POST" class="formulario__editar" enctype="multipart/form-data">
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
							<td>Pago</td>
                        	<td><input type="text" id="" value="<?=$Pago?>" name="Pago"></td>
						</tr>
						<tr>
							<td>Producto</td>
                        	<td><input type="text" id="" value="<?=$producto?>" name="producto"></td>
						</tr>
						<tr>
							<td>Cantidad</td>
                        	<td><input type="text" id="" value="<?=$cantidad?>" name="cantidad"></td>
						</tr>
						<tr>
							<td>Precio</td>
                        	<td><input type="text" id="" value="<?=$precio?>" name="precio"></td>
						</tr>

						<tr>
                        
						<td><input	type="submit" value="Editar"></td>
                        <td><a href="listarpedidos.php">Cancelar</a></td>						
        </form>

	   
</div>
</body>
</html>