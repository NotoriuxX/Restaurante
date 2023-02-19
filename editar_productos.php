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
$consulta ="SELECT * FROM productos ";
$ejecutar = $conexion ->query($consulta);
$row = $ejecutar->fetch_all();
include 'templates/cabecera3.php';
?>

<html>
<body>
    <?php
    $ID = $_GET['id'];
    $NOMBRE = $_GET['nombre'];
    $STOCK = $_GET['stock'];
    $PRECIO = $_GET['precio'];
    $categoria = $_GET['categoria'];
    $Descripcion = $_GET['Descripcion'];
    
    ?>
  <div>
	  <form action="php/sp_editar.php" method="POST" class="formulario__editar" enctype="multipart/form-data">
                        <h2>Editar</h2>
                        <tr>
							<td>ID</td>
                        	<td><input type="text" id="" value="<?=$ID?>" name="ID" readonly="readonly"></td>
						</tr>
						<tr>
							<td>NOMBRE</td>
                        	<td><input type="text" id="" value="<?=$NOMBRE?>" name="NOMBRE"></td>
						</tr>
						<tr>
							<td>STOCK</td>
                        	<td><input type="text" id="" value="<?=$STOCK?>" name="STOCK"></td>
						</tr>
						<tr>
							<td>PRECIO</td>
                        	<td><input type="text" id="" value="<?=$PRECIO?>" name="PRECIO"></td>
						</tr>

						<tr>
						<tr><label class="text-center" for="imagen">Seleccione imagen a cargar</label></tr>
						<tr><input class="form-control" id="imagen" name="imagen" size="30" type="file"> 
       					   </tr>
							  

						</tr>
						
                        <tr>categoria</tr>
						<div class = "radio">
                            <?php
                        switch($categoria){
							case 1:?> <td><input type="radio" id="" name="categoria" value=1 checked > postres<br></td>
                                      <td><input type="radio" id="" name="categoria" value=2 required> ensalada<br></td>
                                      <td><input type="radio" id="" name="categoria" value=3> plato fondo</td>
                             <?php ;
							break;
							case 2:?> <td><input type="radio" id="" name="categoria" value=1 required> postres<br></td>
                                      <td><input type="radio" id="" name="categoria" value=2  checked> ensalada<br></td>
                                      <td><input type="radio" id="" name="categoria" value=3> plato fondo</td> <?php ;
							break;
							case 3:?> <td><input type="radio" id="" name="categoria" value=1 required> postres<br></td>
                                     <td><input type="radio" id="" name="categoria" value=2 > ensalada<br></td>
                                    <td><input type="radio" id="" name="categoria" value=3 checked> plato fondo</td> <?php ;
							break;
						}
                        ?>
						</div>
						<tr>
							<td>Descripcion</td>
                            
							<td><input type="text" id="" value="<?=$Descripcion?>" name="Descripcion"></td>
						</tr>
						<td><input	type="submit" value="Editar"></td>
                        <td><a href="Listarproducto.php">Cancelar</a></td>						
        </form>

	   
</div>
</body>
</html>