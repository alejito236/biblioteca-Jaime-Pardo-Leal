<?php

    
  
    $conexion = new  mysqli("localhost","root","","prestamos");
    if ($conexion){
       
      }else{
          echo "insercion no exitosa";
      }

      require 'PHPMailerAutoload.php';
    require 'class.smtp.php';
    require 'class.phpmailer.php';

   $clave=$_POST["clave"];
    $login = $_POST["login"];

    
    $template = file_get_contents('template.php');
    $template = str_replace("{{clave}}",$clave, $template);
    $template = str_replace("{{login}}",$login, $template);
   
    $template = str_replace("{{year}}", date('Y'), $template);
    ;
   

$mail = new PHPMailer();
$mail->CharSet = "UTF-8";
$mail->isSMTP();
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
    );
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Host ='smtp.gmail.com';
$mail->Port =587;

$mail->Username = 'ambientes.rev@gmail.com'; //Correo de donde enviaremos los correos
$mail->Password = 'ambientes2999'; // Password de la cuenta de envío

$mail->setFrom('ambientes.rev@gmail.com', 'Cambio de contraseña');

$login=$_POST["login"];


$sqlReceptor=("SELECT * FROM usuarios WHERE login='$login'");
$resultReceptor = $conexion->query($sqlReceptor);

while($row_receptor =$resultReceptor->fetch_assoc()){

$correo_receptor = $row_receptor['correo'];
// $receptor = $row_receptor['nombre'];
$mail->addAddress($correo_receptor); //Correo receptor

$mail->isHTML(true);
$mail->Subject = 'Cambio de contraseña';
$mail->Body= $template;

if($mail->send()) {
    echo '<script> alert("Te hemos enviado un correo a '.$login.' para recuperar tu cuenta");window.location = "../index.php" </script>';
         
    } else {
    // echo'<script> alert("Error al enviar el correo verifique su direccion"); window.location = "../index.html" </script>';
}




}

?>

