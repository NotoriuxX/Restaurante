<?php

    session_start();

    if(isset($_SESSION['usuario'])){
        header("location: Tienda.php");
    }
    if(isset($get['cerrar_sesion'])){
        session_unset();

        session_destroy();
    
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="CSS/estiloslogin.css">
    <link rel="stylesheet" href="CSS/estilosnavlog.css">
</head>
<header>
<nav class="nav  nav-fill">
        <a class="nav-link active" aria-current="page" href=#fecha>contacto</a>
        <a class="nav-link" href="preguntasfrecuentes.html">preguntas frecuentes</a>
        <a href="index.php" style="height: 66px;width: 234px;margin: -9px 21px 2px 5px;text-align: center;"> <img src="IMG/logo1.png"  alt="logo" class="img_logo"/></a>
        <a class="nav-link" href="Tienda_sevo.php">Menu</a>
        <a class="nav-link" href="login.php"><i class="bi bi-person-circle"></i></a>
      </nav>
</header>
<body>

        <main>

            <div class="contenedor__todo">
                <div class="caja__trasera">
                    <div class="caja__trasera-login">
                        <h3>¿Ya tienes una cuenta?</h3>
                        <p>Inicia sesión para entrar en la página</p>
                        <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                    </div>
                    <div class="caja__trasera-register">
                        <h3>¿Aún no tienes una cuenta?</h3>
                        <p>Regístrate para que puedas iniciar sesión</p>
                        <button id="btn__registrarse">Regístrarse</button>
                    </div>
                </div>

                <!--Formulario de Login y registro-->
                <div class="contenedor__login-register">
                    <!--Login-->
                    <form action="php/login_usuario.php" method="POST" class="formulario__login">
                        <h2>Iniciar Sesión</h2>
                        <input type="text" placeholder="Correo Electronico" name="correo" required maxlength="50">
                        <input type="password" placeholder="password" name="password" required maxlength="20">
                        <button>Entrar</button>
                    </form>

                    <!--Register-->
                    <form action="php/registro_usuario.php" method="POST" class="formulario__register">
                        <h2>Regístrarse</h2>
                        <input type="text" placeholder="Nombre completo" name="nombre_completo" required maxlength="20">
                        <input type="text" placeholder="Correo Electronico" name="correo" required maxlength="50">
                        <input type="text" placeholder="Direccion" name="direccion" required maxlength="100">
                        <input type="text" placeholder="Celular" name="celular" required maxlength="12">
                        <input type="password" placeholder="Contraseña" name="password" required maxlength="20">
                        <button>Regístrarse</button>
                    </form>
                </div>
            </div>

        </main>

        <script src="js/scriptLogin.js"></script>
        
</body>
</html>