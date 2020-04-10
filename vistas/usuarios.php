<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="../public/css/libs/stilos.css"/>

</head>
<body>
  
</body>


<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();
if (!isset($_SESSION["nombre"]))
{
  header("Location: login.html");
}
else
{
require 'header.php';

if ($_SESSION['Usuarios']==1)
{
?>
<!-- Inicio Contenido PHP-->
<div class="row">
  <div class="col-lg-12">
    <div class="main-box clearfix">
      <header class="main-box-header clearfix">
        <h2 class="box-title">Usuarios <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Nuevo</button></h2>      
     </header>
        <div class="main-box-body clearfix" id="listadoregistros"> 
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover" id="tbllistado">
              <thead>
                <tr>
                  
                  <th>Nombre</th>
                  <th>Direccion</th>
                  <th>Telefono</th>
                  <th>Correo</th>
                  <th>Imagen</th>                                    
                  <th>Estado</th>    
                  <th>Opciones</th>                                
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      <div class="main-box-body clearfix" id="formularioregistros">
         <form name="formulario" id="formulario" method="POST">
           <div class="row">
            <div class="form-group col-sm-6 col-xs-12">
              <label>Nombre</label>
              <input type="hidden" name="idusuario" id="idusuario">
              <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" minlength="2" maxlength="30" title="Solo se admiten Letras" autofocus="autofocus" placeholder=" nombre Completo" required>
            </div>
           </div>
            <div class="row">
                <div class="form-group col-sm-6 col-xs-12">
              <label>Barrio</label>
              <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Direccion" minlength="2" maxlength="12" pattern="[a-z]{1,15}" title="Solo se admiten Letras" placeholder=" nombre Completo" required> 
            </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6 col-xs-12">
              <label>Telefono</label>
                <input type="text" name="telefono" id="telefono" class="form-control"pattern="[0-9]+"  title="Solo se admiten numeros" minlength="2" maxlength="12" placeholder=" identificaion" required>
            </div>
            <div class="row">
                <div class="form-group col-sm-3 col-xs-12">
              <label>Correo</label>
              <input type="text" name="login" id="login" class="form-control"pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" minlength="2" maxlength="40" placeholder="su email" required>
            </div>
                 <div class="form-group col-sm-3 col-xs-12">
              <label>Clave</label>
              <input type="password" name="clave" id="clave" class="form-control" placeholder="Clave"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="debe contener un numero una mayuscula una minuscula y debe tener una longitud de 8 caracteres" required>
            </div>
             </div>
             <div class="row">
                 <div class="form-group col-sm-3 col-xs-12">
                 <label>Permisos:</label>
                <ul style="list-style: none;" id="permisos">
                </ul>
                </div>
             <div class="form-group col-sm-3 col-xs-12">
            <label>Imagen</label>
                <input type="file" class="form-control" name="imagen" id="imagen">
                <input type="hidden" name="imagenactual" id="imagenactual">
                <img src="" width="150px" height="120px" id="imagenmuestra">
            </div>
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
              <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
            </div>
          </form>
        </div>
    </div>
  </div>
</div>
<!-- Fin Contenido PHP-->
<?php
}
else
{
  require 'noacceso.php';
}


require 'footer.php';
?>
<script type="text/javascript" src="scripts/usuarios.js"></script>
<?php 
}
ob_end_flush();
?>
<div class="footer5"> © 2020 Copyright: JAIME PARDO LEAL </div>
    <!-- Copyright -->
  
  </footer>
  <!-- Footer -->
</html>