<?php

session_start();
include 'php/conexion.php';
include 'php/config.php';
include 'carrito.php';

$usuario = $_SESSION['usuario'];
if(!isset($usuario)){ 
header("location:Tienda.php");
 die();
 
}
header("refresh:3;url=Tienda.php");

$consulta ="SELECT * FROM productos ";
$ejecutar = $conexion ->query($consulta);
$row = $ejecutar->fetch_all();


include 'templates/cabecera.php';

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];
$celular = $_POST['celular'];
$formaPago = $_POST['pago'];

?>
<div class="jumbotron">
  <h1 class="display-4">¡LISTO!</h1>
  <hr class="my-4">
  <p class="lead"> Compra Realizada <p>
  
</div>

  <?php 
  $total1=0;
  $SID=session_id();


  foreach($_SESSION['CARRITO'] as $indice=>$producto){
    $Precio =$producto['PRECIO'];
    $Cantidad =$producto['CANTIDAD'];
    $IDPRO =$producto['ID'];
    $nombreprod = $producto['NOMBRE'];
    $sentecia1 = "INSERT INTO `encargos` (`id_pedido`, `id_sesion`, `nombre`, `correo`, `direccion`, `celular`, `formapago`, `nom_producto`, `canti_producto`, `precio`) 
                                  VALUES (NULL,'$SID','$nombre','$correo','$direccion','$celular','$formaPago','$nombreprod', '$Cantidad', '$Precio'); ";
    $ejecutar1 = $conexion ->query($sentecia1);

    
    $consulta3 ="SELECT MAX(id_pedido) AS id_pedido FROM encargos";
    $ejecutar3 = $conexion ->query($consulta3);
    $id_produc = $ejecutar3;

    $sentecia2 ="SELECT * FROM productos where id_pro = '$IDPRO'";
    $ejecutar2 = $conexion ->query($sentecia2);
    $row1 = $ejecutar2->fetch_assoc();
    $stockresto = $row1['stock_pro'];

    $stockactualizado =  $stockresto - $Cantidad;


    $sentecia4 = "UPDATE `productos` SET `stock_pro` =  $stockactualizado WHERE `id_pro` =  $IDPRO; ";                           
    $ejecutar4 = $conexion ->query($sentecia4);
    
  }
  
  ?>
  






<?php include 'templates/pie.php';
session_destroy();
?>