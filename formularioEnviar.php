<?php

session_start();
include 'php/conexion.php';
include 'php/config.php';
include 'carrito.php';
$usuario = $_SESSION['usuario'];
if(empty($_SESSION['CARRITO'])){
  header("location:Tienda.php");
  session_destroy();
 die();
}

$consulta ="SELECT * FROM productos ";
$ejecutar = $conexion ->query($consulta);
$row = $ejecutar->fetch_all();

$consulta1 ="SELECT * FROM usuarios where id_usu = '$usuario'";
$ejecutar1 = $conexion ->query($consulta1);
$row1 = $ejecutar1->fetch_assoc();

include 'templates/cabecera.php';
?>
<header>
<div class="form_div" style=" 
    display: flex;
    flex-wrap: nowrap;
    flex-direction: column;
    align-items: center;
">

  <table class="table">
    
  <thead>
    <tr>
      <th scope="col" style="    display: flex;
    justify-content: center;
    font-size: 28px;">Total</th>
      
    </tr>
  </thead> 

  <?php 
  
  $total1=0;
  $SID=session_id();
  $Correo=$usuario;
  $Direccion=$row1['direc_usu'];
  $Celular=$row1['celu_usu'];
  

  $total=0;?>
</table>
<?php foreach($_SESSION['CARRITO'] as $indice=>$producto){?>
  <input hidden type="text" name="nombre" class="form-control" value="<?php $total = $total +($producto['PRECIO']*$producto['CANTIDAD']);  ?> ">

  <?php } ?>
  <h4><?php echo number_format($total); ?></h4>


<form class="form1 formulario__datos" id="form1" method="POST" action="Finalizado.php" > 

	<label>Nombre</label>
    <input type="text" name="nombre" class="form-control" value="<?php echo $row1['nom_usu']?>" required>

    <label>Correo</label>
    <input type="text" name="correo" class="form-control"   value="<?php echo $usuario?>" required>

    <label>direccion</label>
    <input type="text" name="direccion" class="form-control"   value="<?php echo $row1['direc_usu']?>" required>

    <label>Celular</label>
    <input type="number" name="celular" class="form-control"  value="<?php echo $row1['celu_usu']?>" required>
    

    <label>Forma de Pago</label>
    <input type="radio" name="pago" value="Paypal" checked><img class="imgfpago" src="IMG/paypal.jpg" alt="Paypal"  > <br>
    <tr>
							
    <button type="submit" value="Comprar" href="Finalizado.php" value="Enviar">Finalizar Compra</button>
    <a href="Tienda.php" class="btn btn-success">Volver</a>

</form>

</div>




<?php include 'templates/pie.php';
?>