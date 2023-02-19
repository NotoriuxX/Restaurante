<?php



$mensaje="";

if(isset($_POST['btnAccion'])){
    Switch($_POST['btnAccion' ]){
        case 'Agregar':
            if(is_numeric(openssl_decrypt($_POST["id"], COD, KEY ))){
                $ID = openssl_decrypt ($_POST["id"], COD, KEY );
                $mensaje.="Ok ID correcto".$ID."<br/>";
            }else{
                $mensaje.="Ups... Producto incorrecto".$ID."<br/>"; break;}
            
            
            if(is_string (openssl_decrypt ($_POST[ "nombre" ], COD, KEY) )){
                $NOMBRE=openssl_decrypt ($_POST["nombre"],COD, KEY) ;
                $mensaje.="Ok NOMBRE correcto".$NOMBRE."<br/>";
            }else{ $mensaje.="Upps. . algo pasa con el nombre"."<br/>"; 
                break;}

                if(is_numeric (openssl_decrypt ($_POST["cantidad"], COD, KEY) ) ) {
                $CANTIDAD=openssl_decrypt ($_POST["cantidad"], COD, KEY) ; 
                $mensaje.="Ok CANTIDAD correcto".$CANTIDAD."<br/>";            
            }else{$mensaje.="Upps.. algo pasa con el cantidad"."<br/>";
                break;}

                if(is_string (openssl_decrypt ($_POST["precio"], COD, KEY) ) ) {
                    $PRECIO=openssl_decrypt ($_POST["precio"], COD, KEY) ;
                    $mensaje.="Ok PRECIO correcto".$PRECIO."<br/>";
                    
                }else{$mensaje.="Upps.. algo pasa con el Precio"."<br/>";
                    break;}

                if(is_string (openssl_decrypt ($_POST["IMG"], COD, KEY))){
                $imagen=Openssl_decrypt ($_POST["IMG"],COD, KEY);
                $mensaje.="Ok IMAGEN correcto".$imagen."<br/>";
                }else{ $mensaje.= "Upps.. algo pasa con la imagen"."<br/>";
                     break;}


                if(!isset($_SESSION['CARRITO'])){
                    $producto=array(
                    'ID'=> $ID,
                    'NOMBRE'=> $NOMBRE,
                    'CANTIDAD'=> $CANTIDAD,
                    'PRECIO'=> $PRECIO,
                    'IMAGEN' => $imagen     
                    );
                    $_SESSION['CARRITO'][0]=$producto;
                }else{
                    $idProductos = array_column($_SESSION['CARRITO'], "ID");
                    /*recorre viendo si esxiste otro producto en la canasta*/
                    if(in_array($ID, $idProductos)){
                        /*varifica si se selecciono el producto y no lo repita*/
                    }else{
                    $NumeroProductos=count($_SESSION['CARRITO']);
                    $producto=array(
                        
                        'ID'=> $ID,
                        'NOMBRE'=> $NOMBRE,
                        'CANTIDAD'=> $CANTIDAD,
                        'PRECIO'=> $PRECIO,
                        'IMAGEN' => $imagen     
                        );
                        $_SESSION['CARRITO'][$NumeroProductos]=$producto;
                }
            }
               // $mensaje = print_r( $_SESSION,true);
               
            break;

            case "Eliminar":
                $ID = $_POST["id"];
                    foreach($_SESSION['CARRITO'] as $indice =>$producto){
                        if($producto['ID']==$ID){
                            unset($_SESSION['CARRITO'][$indice]);
                        }
                    }
            break;
            
            
        }

        
        
}

?>