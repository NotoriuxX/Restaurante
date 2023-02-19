<?php

session_start();
include 'php/conexion.php';
include 'php/config.php';
include 'carrito.php';

$usuario = $_SESSION['usuario'];
if(!isset($usuario)){
  header("location:Tienda_sevo.php");
  session_destroy();
 die();
}

$consulta ="SELECT * FROM productos ";
$ejecutar = $conexion ->query($consulta);
$row = $ejecutar->fetch_all();
include 'templates/cabecera.php';
?>

<!-----MODAL------->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Carrito</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        

      <div class="canasta_titulo" >
                    
                 
      <?php
      if(!empty($_SESSION['CARRITO'])){
        $total=0;?>
                      
        <table class="container_canasta" id="container_canasta">
           <h2 class="container_canasta_txt">Mi Pedido</h2>
           <section id="items2">
           
           <?php foreach($_SESSION['CARRITO'] as $indice=>$producto){?>
              <tr class="container_tablero_nom">
                <div class="carrito_productos">
                  <td><img src="IMG/<?php echo $producto['IMAGEN'];?>" alt=" "class="product_img"/></td>
                  <td class="nombre_canasta"><?php echo $producto['NOMBRE'];?> </td> 
                  <td class="precio_canasta"><input style=" border: 0; width: 70px" readonly type="text" id="valor_<?php echo $producto['NOMBRE'];?>" value="<?php echo number_format($producto['PRECIO']*$producto['CANTIDAD']);?>"> </td>
                  <td class="th "><input type="text" readonly style=" border: 0; width: 70px; height: 40px;" value=" <?php echo $producto['CANTIDAD'];?>" id="txt_<?php echo $producto['NOMBRE'];?>">
                  <h3 id="cantidad" ><h3>
                  
                  </td>
                          
                  <form action="" method="post">
                  <input type="hidden" name="id" id="id" value="<?php echo $producto['ID']; ?>"/>
                  <td><button type="submit" name="btnAccion" value="Eliminar" class="front btn btn-outline-danger">Eliminar</button></td>
                  </form>
                </div> 
              </tr>

                         
            <?php $total = $total +($producto['PRECIO']*$producto['CANTIDAD']); } ?>   
        </section>   
      <table class="container_canasta_2" id="footer-items">
        <h2 class="container_canasta_txt">Resumen de compra</h2>
        <tr class="container_tablero_nom">
          <td>
          <td><h3 class="Total_cart">Total: <?php echo number_format($total); ?></h3></td> <!---<input id="Total_input" class="inome"type="text" nom="nome" value=" 20.000" readonly>--></th>
          <a href="formularioEnviar.php"><button type="button" class="front btn btn-outline-success">Comprar</button></a></th>
        </td>
        </tr>
      </table>
      </form> 
      <?php  }else{?>
      <div class="alert alert-success">
        No hay productos en el carrito
      </div><?php }?>
    </div>
  </div>
  
</div>
</div>
</div>
<!-----MODAL------->

                  
            
                     
                        



        <div class="encabezado">
          <div class="tablercatego">
              <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Filtrar
              </button>
              
              <ul class="dropdown-menu" id = "myBtnContainer" aria-labelledby="dropdownMenuButton1">
                <li><button class="btn active" onclick="filterSelection('all')"> Todos</button></li>
                <li><button class="btn" onclick="filterSelection('2')"> ensalada</button></li>
                <li><button class="btn" onclick="filterSelection('3')">plato fondo</button></li>
                <li><button class="btn" onclick="filterSelection('1')">postres</button></li>
              </ul>
            
          </div>
            <div class="categoria" role="tablist">
                <div class="title_menu">
            
        </div>
        <h2 class="main-title"> Menu </h2>
        </div>
      </div>
        <div class="container_Productos" >
               
               
                
                <main class="container_Productossub" >
                    <div class="container" >
                    
                    <section class="conteiner-productos_1" id="items">
                    
                    <?php foreach($row as $producto){?>

                    
                      <div  class="product <?php echo $producto[5]; ?>" id ="productos">
                        <div class="contenedor_1">
                        <img src="IMG/<?php echo $producto[4];?>" alt=" "class="product_img"/> 
                            <h2 class="product_title"><?php echo $producto[1];?></h2>
                            <h3 class="product_price_1"><?php echo $producto[3];?></h3>
                            <span class="product_price" data-toggle="popover"><?php echo $producto[6];?></span>
                            <form action="" method="post">
                              <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto[0],COD,KEY); ?>"/>
                              <input type="hidden" name="IMG" id="IMG" value="<?php echo openssl_encrypt($producto[4],COD,KEY); ?>"/>
                              <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto[1],COD,KEY);?>"/>
                              <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto[3],COD,KEY);?>"/>
                              <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY); ?>"/>
                              <button rows="10" cols="40" name="btnAccion" type="submit" class="btn btn-success" value="Agregar" id="btn_4">Encargar</button>

                            
                             
                            </form>
                            
                             
                             
                        </div>
                        <div class="raya">
                              <svg width="356" height="6" viewBox="0 0 356 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M0.113249 3L3 5.88675L5.88675 3L3 0.113249L0.113249 3ZM355.887 3L353 0.113249L350.113 3L353 5.88675L355.887 3ZM3 3.5H3.99432V2.5H3V3.5ZM5.98295 3.5H7.97159V2.5H5.98295V3.5ZM9.96023 3.5H11.9489V2.5H9.96023V3.5ZM13.9375 3.5H15.9261V2.5H13.9375V3.5ZM17.9148 3.5H19.9034V2.5H17.9148V3.5ZM21.892 3.5H23.8807V2.5H21.892V3.5ZM25.8693 3.5H27.858V2.5H25.8693V3.5ZM29.8466 3.5H31.8352V2.5H29.8466V3.5ZM33.8239 3.5H35.8125V2.5H33.8239V3.5ZM37.8011 3.5H39.7898V2.5H37.8011V3.5ZM41.7784 3.5H43.767V2.5H41.7784V3.5ZM45.7557 3.5H47.7443V2.5H45.7557V3.5ZM49.7329 3.5H51.7216V2.5H49.7329V3.5ZM53.7102 3.5H55.6989V2.5H53.7102V3.5ZM57.6875 3.5H59.6761V2.5H57.6875V3.5ZM61.6648 3.5H63.6534V2.5H61.6648V3.5ZM65.642 3.5H67.6307V2.5H65.642V3.5ZM69.6193 3.5H71.608V2.5H69.6193V3.5ZM73.5966 3.5H75.5852V2.5H73.5966V3.5ZM77.5739 3.5H79.5625V2.5H77.5739V3.5ZM81.5512 3.5H83.5398V2.5H81.5512V3.5ZM85.5284 3.5H87.5171V2.5H85.5284V3.5ZM89.5057 3.5H91.4944V2.5H89.5057V3.5ZM93.483 3.5H95.4716V2.5H93.483V3.5ZM97.4603 3.5H99.4489V2.5H97.4603V3.5ZM101.438 3.5H103.426V2.5H101.438V3.5ZM105.415 3.5H107.403V2.5H105.415V3.5ZM109.392 3.5H111.381V2.5H109.392V3.5ZM113.369 3.5H115.358V2.5H113.369V3.5ZM117.347 3.5H119.335V2.5H117.347V3.5ZM121.324 3.5H123.313V2.5H121.324V3.5ZM125.301 3.5H127.29V2.5H125.301V3.5ZM129.279 3.5H131.267V2.5H129.279V3.5ZM133.256 3.5H135.244V2.5H133.256V3.5ZM137.233 3.5H139.222V2.5H137.233V3.5ZM141.21 3.5H143.199V2.5H141.21V3.5ZM145.188 3.5H147.176V2.5H145.188V3.5ZM149.165 3.5H151.153V2.5H149.165V3.5ZM153.142 3.5H155.131V2.5H153.142V3.5ZM157.119 3.5H159.108V2.5H157.119V3.5ZM161.097 3.5H163.085V2.5H161.097V3.5ZM165.074 3.5H167.063V2.5H165.074V3.5ZM169.051 3.5H171.04V2.5H169.051V3.5ZM173.028 3.5H175.017V2.5H173.028V3.5ZM177.006 3.5H178.994V2.5H177.006V3.5ZM180.983 3.5H182.972V2.5H180.983V3.5ZM184.96 3.5H186.949V2.5H184.96V3.5ZM188.937 3.5H190.926V2.5H188.937V3.5ZM192.915 3.5H194.903V2.5H192.915V3.5ZM196.892 3.5H198.881V2.5H196.892V3.5ZM200.869 3.5H202.858V2.5H200.869V3.5ZM204.847 3.5H206.835V2.5H204.847V3.5ZM208.824 3.5H210.812V2.5H208.824V3.5ZM212.801 3.5H214.79V2.5H212.801V3.5ZM216.778 3.5H218.767V2.5H216.778V3.5ZM220.756 3.5H222.744V2.5H220.756V3.5ZM224.733 3.5H226.721V2.5H224.733V3.5ZM228.71 3.5H230.699V2.5H228.71V3.5ZM232.687 3.5H234.676V2.5H232.687V3.5ZM236.665 3.5H238.653V2.5H236.665V3.5ZM240.642 3.5H242.631V2.5H240.642V3.5ZM244.619 3.5H246.608V2.5H244.619V3.5ZM248.596 3.5H250.585V2.5H248.596V3.5ZM252.574 3.5H254.562V2.5H252.574V3.5ZM256.551 3.5H258.54V2.5H256.551V3.5ZM260.528 3.5H262.517V2.5H260.528V3.5ZM264.506 3.5H266.494V2.5H264.506V3.5ZM268.483 3.5H270.471V2.5H268.483V3.5ZM272.46 3.5H274.449V2.5H272.46V3.5ZM276.437 3.5H278.426V2.5H276.437V3.5ZM280.415 3.5H282.403V2.5H280.415V3.5ZM284.392 3.5H286.381V2.5H284.392V3.5ZM288.369 3.5H290.358V2.5H288.369V3.5ZM292.347 3.5H294.335V2.5H292.347V3.5ZM296.324 3.5H298.313V2.5H296.324V3.5ZM300.301 3.5H302.29V2.5H300.301V3.5ZM304.279 3.5H306.267V2.5H304.279V3.5ZM308.256 3.5H310.244V2.5H308.256V3.5ZM312.233 3.5H314.222V2.5H312.233V3.5ZM316.21 3.5H318.199V2.5H316.21V3.5ZM320.188 3.5H322.176V2.5H320.188V3.5ZM324.165 3.5H326.154V2.5H324.165V3.5ZM328.142 3.5H330.131V2.5H328.142V3.5ZM332.12 3.5H334.108V2.5H332.12V3.5ZM336.097 3.5H338.086V2.5H336.097V3.5ZM340.074 3.5H342.063V2.5H340.074V3.5ZM344.051 3.5H346.04V2.5H344.051V3.5ZM348.029 3.5H350.017V2.5H348.029V3.5ZM352.006 3.5H353V2.5H352.006V3.5Z" fill="black"/>
                              </svg>
                        </div>                        
                      </div> 
                      

                      <?php }?>
                      </section>
                    

                    

                    

                        
                </main>
        </div>
        
    </div>
    

</div>




          
          
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript"></script>
        <?php include 'templates/pie.php'?>
        <script>
          
          function sumar(id_casilla,id_precio,precio,txt_total){
              var cantidad = document.getElementById(id_casilla).value;
              var total = document.getElementById(txt_total).value;
              
              cantidad = parseInt(cantidad) + 1;
              var precio_final = parseInt(precio) * cantidad;
              document.getElementById(id_casilla).value = cantidad;
              document.getElementById(id_precio).value = precio_final;
              total = parseInt(total) + precio_final;
              document.getElementById("txt_total").value = total;
            }
            function restar(id_casilla,id_precio,precio,txt_total){
              var cantidad = document.getElementById(id_casilla).value;
              var total = document.getElementById(txt_total).value;
              var paso = false;
              cantidad = parseInt(cantidad) - 1;
              if (cantidad == 0){
                cantidad = 1;
                paso = true;
              }
              var precio_final = parseInt(precio) * cantidad;
              document.getElementById(id_casilla).value = cantidad;
              document.getElementById(id_precio).value = precio_final;
              if(paso == false){
                total = parseInt(total) - precio_final;
                document.getElementById("txt_total").value = total;
              }
              
            }
            

filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("product");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
  }
  element.className = arr1.join(" ");
}


// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
        </script>
   