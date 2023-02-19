<?php
    
session_start();

if(!isset($_SESSION['usuario'])){
  echo'
    <script>
      alert("Por favor debe iniciar_sesión");
      window.location = "../login.php";
    </script>
  ';
  header("location: ../login.php");
  session_destroy();
  die();
}

?>

