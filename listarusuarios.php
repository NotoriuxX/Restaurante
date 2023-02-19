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
$consulta ="SELECT * FROM `usuarios` ORDER BY `usuarios`.`id_usu` ASC ";
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
			  <a class="text-white h4" href="listarproducto.php">Lista de Pedidos</a>
			<br>
			<a class="text-white h4" href="listarproducto.php">Lista de Productos</a>
			</br>
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
							
							<th scope="col">Nombres</th>
							<th scope="col">Email</th>
							<th scope="col">Direccion</th>
							<th scope="col">Password</th>
							<th scope="col">Celular</th>
							<th scope="col">Tipo de Usuario</th>
							<th style="text-align:center;width:100px;">Add row <button data-bs-toggle="modal"  data-bs-target="#ModalAgregar" type="button" data-func="dt-add" class="btn btn-success btn-xs dt-add" style="padding-right: 1px;padding-top: 0px;padding-left: 1px;padding-bottom: 1px;border-top-width: 0px;">
							<i class="bi bi-plus"></i>
							</button>
					</tr>
					
					<?php
						foreach($row as $usuarios){
						$tipo ="";
						switch($usuarios[5]){
							case 1: $tipo = 'Administrador';
							break;
							case 2: $tipo = 'Cliente';
							break;
						}?>

						<tr>
							<td scope="row"><?php echo $usuarios[0] ?></td>
							<td><?php echo $usuarios[1]?></td>
							<td><?php echo $usuarios[2]?></td>
							<td><?php echo $usuarios[3]?></td>
							<td>*************************</td>
							<td><?php echo $usuarios[6]?></td>
							<td><?php echo $tipo ?></td>
						<td>

							<a href="php/sp_eliminar2.php?id=<?php echo $usuarios[0]?>" ><button type="button"  class="btn btn-danger btn-xs dt-delete" style="padding-right: 1px;padding-top: 0px;padding-left: 1px;padding-bottom: 1px;border-top-width: 0px;"><i class="bi bi-x"></i></button></a>

							<a href="editar_productosusu.php?id=<?php echo $usuarios[0]?>&nombre=<?php echo $usuarios[1]?>&email=<?php echo $usuarios[2]?>&direccion=<?php echo $usuarios[3]?>&celular=<?php echo $usuarios[6]?>&tipoUsuario=<?php echo $usuarios[5]?>"><button type="button" class="btn btn-primary btn-xs dt-delete" style="padding-right: 1px;padding-top: 0px;padding-left: 1px;padding-bottom: 1px;border-top-width: 0px; background-color: #144bb5; border-color: #144bb5;"><i class="bi bi-pencil"></i></button></a>
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

	  <form action="php/registro_usuariousu.php" method="POST" class="formulario__editar" enctype="multipart/form-data">
	  <h2>Agregar</h2>
	  
	  					<input type="text" placeholder="Nombre completo" name="nombre_completo">
                        <input type="text" placeholder="Correo Electronico" name="correo">
                        <input type="text" placeholder="Direccion" name="direccion">
                        <input type="text" placeholder="Celular" name="celular">
						
						<h4>tipoUsuario</h4>
                 		<input type="radio" id="" value= 1 name="tipoUsuario" checked> Administrador<br>
                        <input type="radio" id="" value= 2 name="tipoUsuario" required > Cliente<br>

						
						<input type="password" placeholder="Contraseña" name="password">
						
						<input	type="submit" value="Guardar">
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
