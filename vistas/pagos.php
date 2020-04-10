<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestamos</title>
    <link rel="stylesheet" type="text/css" href="../public/css/libs/stilos.css"/>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

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

if ($_SESSION['Pagos']==1)
{
?>
    <!-- Inicio Contenido PHP-->
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box clearfix">
                <header class="main-box-header clearfix">
                    <h2 class="box-title">Sanción <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Nuevo</button></h2>
                </header>
                <div class="main-box-body clearfix" id="listadoregistros">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-condensed table-hover" id="tbllistado">
                            <thead>
                                <tr>
                                  
                                    <th>Libro</th>
                                    <th>Usuario</th>
                                    <th>Fecha</th>
                                    <th>Cuota a pagar</th>
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
                        <div class="form-group col-sm-5 col-xs-12">
                            <label>libro</label>
                            <input type="hidden" name="idpago" id="idpago">
                        <select id="idprestamo" name="idprestamo" class="form-control selectpicker" data-live-search="true" required></select>
                        </div>
                        </div>
                        
                        
                        <div class="row">
                              <div class="form-group col-sm-5 col-xs-12">
                            <label>Usuario</label>
                            <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario" title="Solo se admiten Letras" autofocus="autofocus" placeholder=" nombre usuario Completo" required>
                            <input type="hidden" name="fecha" id="fecha">
                        </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-sm-2 col-xs-12">
                            <label>Cuota a pagar</label>
                            <input type="number" name="cuota" id="cuota" class="form-control" placeholder="Valor"  pattern="[0-9]+"  title="Solo se admiten numeros" minlength="2" maxlength="12" placeholder=" identificaion" required>
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
        <script type="text/javascript" src="scripts/pagos.js"></script>
<?php 
}
ob_end_flush();
?>
<div class="footer4"> © 2020 Copyright: JAIME PARDO LEAL </div>
    <!-- Copyright -->
  
  </footer>
  <!-- Footer -->

</html>