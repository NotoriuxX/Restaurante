<?php
include 'conexion.php';

    $NOMBRE = $_POST['NOMBRE'];
    $STOCK = $_POST['STOCK'];
    $PRECIO = $_POST['PRECIO'];
    $categoria = $_POST['categoria'];
    $Descripcion = $_POST['Descripcion'];
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
    

    $query = "INSERT INTO `productos` (`id_pro`, `nom_pro`, `stock_pro`, `prec_pro`, `img_pro`, `id_cate`, `descripcion`)
                     VALUES (NULL, '$NOMBRE', $STOCK, $PRECIO, '$nombre_img', $categoria, '$Descripcion');";
    $ejecutar = mysqli_query($conexion, $query);  
    if(!$ejecutar){
        echo "No se agregi el producto!";
    }else{
        header("Location: ../Listarproducto.php");
    }
?>