<?php
  include("../logica/conexion.php");

    $correoUsuario = $_POST['correoUsuario'];
    $claveUsuario	= $_POST['claveUsuario'];

 

  $query = "UPDATE usuario SET  claveUsuario ='$claveUsuario'  
  where correoUsuario='$correoUsuario'";
  $resultado=$conexion->query($query);

  if ($resultado) {
    header('location:  ../index.php');  }
 else {
     echo"no se inserto";
 }

?>

