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
$consulta ="SELECT * FROM `encargos` ORDER BY `encargos`.`id_pedido` DESC ";
$ejecutar = $conexion ->query($consulta);
$row = $ejecutar->fetch_all();

$consulta2 ="SELECT * FROM `recervas` ORDER BY `recervas`.`id` DESC ";
$ejecutar2 = $conexion ->query($consulta2);
$row2 = $ejecutar2->fetch_all();
include 'templates/cabecera3.php';
?>
    
    <header>
		
        <nav class="navbar navbar-dark bg-dark">
			
			  <div class="container-fluid">
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
			  </div>
		  </nav>
		  <div class="collapse" id="navbarToggleExternalContent">
			<div class="bg-dark p-4">
			  <a class="text-white h4" href="listarproducto.php">Lista de Productos</a>
</br>
			  <a class="text-white h4" href="listarusuarios.php">Lista de Usuarios</a>
			<br>
			  <a class="text-white h4" href="Perfil.php">Mi perfil</a>
			<br>
			  <a class="text-white h4" href="Tienda.php">Tienda virtual</a>
			<br>
			</div>
			
    </header>
    <body>
	<div>
	<div>
                </div>
		<div class="container">
			<h4>Listar Productos</h4>
		<div class="row align-items-start">
			<table class="table table-dark table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
							<th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Order: activate to sort column descending" style="width: 60.234px;" aria-sort="ascending">ID</th>
							<th scope="col">nombre</th>
							<th scope="col">correo</th>
							<th scope="col">direccion</th>
							<th scope="col">celular</th>
							<th scope="col">Pago</th>
							<th scope="col">producto</th>
                            <th scope="col">cantidad</th>
                            <th scope="col">precio</th>
					</tr>
					
					<?php
						foreach($row as $encargos){
						?>

						<tr>
							<td scope="row"><?php echo $encargos[0] ?></td>
							<td><?php echo $encargos[2]?></td>
							<td><?php echo $encargos[3]?></td>
							<td><?php echo $encargos[4]?></td>
							<td><?php echo $encargos[5]?></td>
                            <td><?php echo $encargos[6]?></td>
                            <td><?php echo $encargos[7]?></td>
                            <td><?php echo $encargos[8]?></td>
                            <td><?php echo $encargos[9]?></td>
						<td>

							<a href="php/sp_eliminar3.php?id=<?php echo $encargos[0]?>" ><button type="button"  class="btn btn-danger btn-xs dt-delete" style="padding-right: 1px;padding-top: 0px;padding-left: 1px;padding-bottom: 1px;border-top-width: 0px;"><i class="bi bi-x"></i></button></a>

							<a href="editar_pedidos.php?id=<?php echo $encargos[0]?>&nombre=<?php echo $encargos[2]?>&email=<?php echo $encargos[3]?>&direccion=<?php echo $encargos[4]?>&celular=<?php echo $encargos[5]?>&Pago=<?php echo $encargos[6]?>&producto=<?php echo $encargos[7]?>&cantidad=<?php echo $encargos[8] ?>&precio=<?php echo $encargos[9]?>">
                             <button type="button" class="btn btn-primary btn-xs dt-delete" style="padding-right: 1px;padding-top: 0px;padding-left: 1px;padding-bottom: 1px;border-top-width: 0px; background-color: #144bb5; border-color: #144bb5;"><i class="bi bi-pencil"></i></button></a>
						</td>
					</tr>
					<?php }?>
				</thead>
			</table>
		  
		</div>
	</div>

	<div class="container">
			<h4>Listar Reservas de mesas</h4>
		<div class="row align-items-start">
			<table class="table table-dark table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
							<th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Order: activate to sort column descending" style="width: 60.234px;" aria-sort="ascending">ID</th>
							<th scope="col">Nombre</th>
							<th scope="col">Email</th>
							<th scope="col">Telefono</th>
							<th scope="col">Fecha</th>
							<th scope="col">Hora</th>
							<th scope="col">Cantidad de Personas</th>
                            <th scope="col">Mensajes</th>
					</tr>
					
					<?php
						foreach($row2 as $recervas){
						?>

						<tr>
							<td scope="row"><?php echo $recervas[0] ?></td>
							<td><?php echo $recervas[1]?></td>
							<td><?php echo $recervas[2]?></td>
							<td><?php echo $recervas[3]?></td>
							<td><?php echo $recervas[4]?></td>
                            <td><?php echo $recervas[5]?></td>
                            <td><?php echo $recervas[6]?></td>
                            <td><?php echo $recervas[7]?></td>
						<td>

							<a href="php/sp_eliminar4.php?id=<?php echo $recervas[0]?>" ><button type="button"  class="btn btn-danger btn-xs dt-delete" style="padding-right: 1px;padding-top: 0px;padding-left: 1px;padding-bottom: 1px;border-top-width: 0px;"><i class="bi bi-x"></i></button></a>

						</td>
					</tr>
					<?php }?>
				</thead>
			</table>
		  
		</div>
	</div>






    <footer>
    
    </footer>
        
        

        
		<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	
    </body>
</html>
