<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros</title>
    
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

if ($_SESSION['Clientes']==1)
{
?>
    <!-- Inicio Contenido PHP-->
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box clearfix">
                <header class="main-box-header clearfix">
                    <h2 class="box-title">Libros <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Nuevo</button></h2>
                </header>
                <div class="main-box-body clearfix" id="listadoregistros">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-condensed table-hover" id="tbllistado">
                            <thead>
                                <tr>
                                    
                                    <th>cantidad</th>
                                    <th>Titulo</th>
                                    <th>ISBN</th>
                                    <th>Autor</th>
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
                            <div class="form-group col-md-5 col-sm-8 col-xs-12">
                            <label>cantidad libro</label>
                            <input type="hidden" name="idcliente" id="idcliente">
                            <input type="number" name="cedula" id="cedula" class="form-control"  autofocus="autofocus"  placeholder="Ingrese cantidad libro"  min="1" max="15" placeholder=" identificaion" required>
                        </div>
                        </div>
                        <div class="row">
                             <div class="form-group col-md-8 col-sm-8 col-xs-12">
                            <label>Titulo</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese titulo del libro"  minlength="2" maxlength="20" title="Solo se admiten Letras"  placeholder=" nombre Completo" required>
                        </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-8 col-sm-8 col-xs-12">
                            <label>ISBN</label>
                          <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Ingrese ISBN del libro" pattern="[0-9]+"  title="Solo se admiten numeros" minlength="2" maxlength="4" placeholder=" identificaion" required>
                        </div>
                        </div> 
                        
                        <div class="row">
                        <div class="form-group col-md-5 col-sm-8 col-xs-12">
                            <label>Autor</label>
                            <input type="text" name="telefono" id="telefono" class="form-control" 
                            placeholder="Ingrese autor del libro" minlength="2" maxlength="20"  title="Solo se admiten Letras"  required> 
                        </div>
                        </div>
                        <div class="form-group col-xs-12">
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
        <script type="text/javascript" src="scripts/clientes.js"></script>
<?php 
}
ob_end_flush();
?>

<footer>

<!-- Copyright -->

<div class="footer3"> © 2020 Copyright: JAIME PARDO LEAL </div>
<!-- Copyright -->

</footer>
<!-- Footer -->

</html>