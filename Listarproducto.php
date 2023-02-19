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
$consulta ="SELECT * FROM `productos` ORDER BY `productos`.`id_pro` ASC ";
$ejecutar = $conexion ->query($consulta);
$row = $ejecutar->fetch_all();
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
			  <a class="text-white h4" href="listarpedidos.php">Lista de Pedidos</a>
			  
			<br>
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
		<div class="row align-items-start">
			<table class="table table-dark table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
							<th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Order: activate to sort column descending" style="width: 60.234px;" aria-sort="ascending">ID</th>
							<th scope="col">NOMBRE</th>
							<th scope="col">STOCK</th>
							<th scope="col">PRECIO</th>
							<th scope="col">ubicacion de la imagen</th>
							<th scope="col">categoria </th>
							<th scope="col">Descripcion</th>
							<th style="text-align:center;width:100px;">Add row <button data-bs-toggle="modal"  data-bs-target="#ModalAgregar" type="button" data-func="dt-add" class="btn btn-success btn-xs dt-add" style="padding-right: 1px;padding-top: 0px;padding-left: 1px;padding-bottom: 1px;border-top-width: 0px;">
							<i class="bi bi-plus"></i>
							</button>
					</tr>
					
					<?php
						foreach($row as $producto){
						$tipo ="";
						switch($producto[5]){
							case 1: $tipo = 'Postres';
							break;
							case 2: $tipo = 'Ensalada';
							break;
							case 3: $tipo = 'Plato Fondo';
							break;
						}?>

						<tr>
							<td scope="row"><?php echo $producto[0] ?></td>
							<td><?php echo $producto[1] ?></td>
							<td><?php echo $producto[2] ?></td>
							<td><?php echo $producto[3] ?></td>
							<td><img src="IMG/<?php echo $producto[4]; ?>" alt="" style="padding-top: 0px; width: 198px; height: 200px;"></td>
							<td><?php echo $tipo ?></td>
							<td><?php echo $producto[6] ?></td>
						<td>

						<a href="php/sp_eliminar.php?id=<?php echo $producto[0]?>" ><button type="button"  class="btn btn-danger btn-xs dt-delete" style="padding-right: 1px;padding-top: 0px;padding-left: 1px;padding-bottom: 1px;border-top-width: 0px;"><i class="bi bi-x"></i></button></a>

							<a href="editar_productos.php?id=<?php echo $producto[0]?>&nombre=<?php echo $producto[1]?>&
							 stock=<?php echo $producto[2]?>&precio=<?php echo $producto[3]?>&image=<?php echo $producto[4]?>&
							 categoria=<?php echo $producto[5]?>&Descripcion=<?php echo $producto[6]?>"><button type="button" class="btn btn-primary btn-xs dt-delete" style="padding-right: 1px;padding-top: 0px;padding-left: 1px;padding-bottom: 1px;border-top-width: 0px; background-color: #144bb5; border-color: #144bb5;"><i class="bi bi-pencil"></i></button></a>
						</td>
					</tr>
					<?php }?>
				</thead>
			</table>



<!-- Modal agregar -->
<div class="modal fade" id="ModalAgregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Agregar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

	  <form action="php/sp_insertar.php" method="POST" class="formulario__editar" enctype="multipart/form-data">
	  <h2>Agregar</h2>
	  
						<tr>
							<td>NOMBRE</td>
                        	<td><input type="text" id="" value="" name="NOMBRE"></td>
						</tr>
						<tr>
							<td>STOCK</td>
                        	<td><input type="text" id="" value="" name="STOCK"></td>
						</tr>
						<tr>
							<td>PRECIO</td>
                        	<td><input type="text" id="" value="" name="PRECIO"></td>
						</tr>

						
						<tr><label class="text-center" for="imagen">Seleccione imagen a cargar</label></tr>
						<tr><input class="form-control" id="imagen" name="imagen" size="30" type="file"></tr>
						
						<tr>
							
							<td>categoria</td>
							<div>
                            <td><input type="radio" id="" value= 1 name="categoria" checked> postres<br></td>
                            <td><input type="radio" id="" value= 2 name="categoria" required > ensalada<br></td>
                            <td><input type="radio" id="" value= 3 name="categoria"> plato fondo</td>
							</div>
						</tr>
						<tr>
							<td>Descripcion</td>
							<td><input type="text" id="" value="" name="Descripcion"></td>
						</tr>
						<td><input	type="submit" value="Guardar"></td>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
			

		 
		</div>
	</div>





    <footer>
    
    </footer>
        
        

        <script src="js/funcionRegistros.js"></script>
		<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script>const myModal = document.getElementById('myModal')
	const myInput = document.getElementById('myInput')

	myModal.addEventListener('shown.bs.modal', () => {
 	 myInput.focus()
	})</script>
    </body>
</html>