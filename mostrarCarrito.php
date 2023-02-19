
<?php

include 'php/conexion.php';
include 'php/config.php';
include 'carrito.php';

?>

<?php if(!empty($_SESSION['CARRITO'])){?>
<template id="tempate-carrito">
                        <tr class="container_tablero_nom">
                          <div class="carrito_productos">
                            <th><img src="IMG/Crepas.jpg" alt=" "class="product_img"/></th>
                            <th class="nombre_canasta"><?php echo $producto['NOMBRE']?> </th> 
                            <th class="precio_canasta"><?php echo number_format($producto['PRECIO']*$producto['CANTIDAD'])?>: 
                            <th class="th "><?php echo $producto['CANTIDAD']?>:
                                 <h3 id="cantidad" ><h3>
                                        <button type="button" class="front_1 btn btn-outline-danger">-</button>
                                        <button type="button" class="front_2 btn btn-outline-success">+</button>
                            </th>
                         
                          <th><button type="button" class="front btn btn-outline-danger">Eliminar</button></th>
                        </div>
                            
            
                        </tr>
                    </template>

                    <template id="tempate-footer">
                        <tr class="container_tablero_nom">
                            <th><h3 class="Total_cart">Total: 0</h3> <!---<input id="Total_input" class="inome"type="text" nom="nome" value=" 20.000" readonly>--></th>
                            <th>
                            <a href="formularioEnviar.php"><button type="button" class="front btn btn-outline-success">Comprar</button></a></th>
                        </tr>
                    <?php }else{?>
                        <div class="alert alert-primary">
                            No hay Productos en el carrito
                        </div>

                    <?php }?>