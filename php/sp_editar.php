<?php
include 'conexion.php';
    $id = $_POST['ID'];
    $NOMBRE = $_POST['NOMBRE'];
    $STOCK = $_POST['STOCK'];
    $PRECIO = $_POST['PRECIO'];
    
    // Recibo los datos de la imagen
    $nombre_img = $_FILES['imagen']['name'];
    $tipo = $_FILES['imagen']['type'];
    $tamano = $_FILES['imagen']['size'];
    if (!empty($nombreImg) ) 
{
   //indicamos los formatos que permitimos subir a nuestro servidor
   if (($_FILES["imagen"]["type"] == "image/gif")
   || ($_FILES["imagen"]["type"] == "image/jpeg")
   || ($_FILES["imagen"]["type"] == "image/jpg")
   || ($_FILES["imagen"]["type"] == "image/png"))
   {
      // Ruta donde se guardarán las imágenes que subamos
      $directorio = $_SERVER['DOCUMENT_ROOT'].'IMG/';
      // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
      move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre_img);
    } 
    else 
    {
       //si no cumple con el formato
       echo "No se puede subir una imagen con ese formato ";
    }
    } 
    else 
    {
   //si existe la variable pero se pasa del tamaño permitido
   if($nombre_img == !NULL) echo "La imagen es demasiado grande "; 
    }   

    $categoria = $_POST['categoria'];
    $Descripcion = $_POST['Descripcion'];
    $query = "UPDATE  `productos` SET `nom_pro` = '$NOMBRE', `stock_pro`=$STOCK, `prec_pro`=$PRECIO, `img_pro`='$nombre_img', `id_cate`=$categoria, `descripcion`='$Descripcion'
                     WHERE id_pro LIKE $id ;";
    $ejecutar = mysqli_query($conexion, $query);                 
    if(!$ejecutar){
        echo "No se Actualizo el producto!";
    }else{
        header("Location: ../Listarproducto.php");
    }
?>