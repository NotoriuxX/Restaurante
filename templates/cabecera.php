<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="CSS/estilos_tienda.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rancho&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,400;1,100&family=Rancho&display=swap" rel="stylesheet">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- Bootstrap icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <title>RATATOILLE</title>
    </head>
    <body>
        <nav class="nav  nav-fill">
            <a class="nav-link active" aria-current="page"  href=#fecha>Contacto</a>
            <a class="nav-link" href="preguntasfrecuentes.html">Preguntas frecuentes</a>
            <a href="index.php" style="height: 66px;width: 234px;margin: -9px 21px 2px 5px;text-align: center;"> <img src="IMG/logo1.png"  alt="logo" class="img_logo"/></a>
            <a class="nav-link"   action="php/iniciar_sesion.php" method="POST" ><button type="button" class="btn text-white " data-bs-toggle="modal" data-bs-target="#exampleModal"  >
              <i class="  bi-cart3 " >   (<?php 
              echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']); 
              ?>)</i>
            </button></a>
            
            <a class="nav-link" href="Perfil.php" ><i class="bi bi-person-circle"></i></a>
          </nav>