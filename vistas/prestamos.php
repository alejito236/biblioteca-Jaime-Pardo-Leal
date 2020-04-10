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

if ($_SESSION['Prestamos']==1)
{
?>
    <!-- Inicio Contenido PHP-->
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box clearfix">
                <header class="main-box-header clearfix">
                     <h2 class="box-title">Préstamos <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Nuevo</button></h2>
                </header>
                <div class="main-box-body clearfix" id="listadoregistros">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-condensed table-hover" id="tbllistado">
                            <thead>
                                <tr>
                                 
                                    <th>libros</th>
                                    <th>Usuarios</th>
                                    <th>Cantidad</th>
                                 
                                   
                        
                                   
                                    <th>Fecha</th>
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
                           <div class="form-group col-md-6 col-sm-9 col-xs-12">
                            <label>Libro que desea</label>
                            <input type="hidden" name="idprestamo" id="idprestamo">
                            <select name="idcliente" id="idcliente" class="form-control selectpicker" data-live-search="true" required></select>                           
                        </div>
                        <div class="form-group col-sm-6 col-xs-12">
                           <label>Usuario</label>
                            <select name="usuario" id="usuario" class="form-control selectpicker" data-live-search="true" required>
                                <option  value="20"><?php echo $_SESSION['nombre']; ?></option>
                            </select> 
                            <input type="hidden" class="form-control" name="fprestamo" id="fprestamo" required>
                        </div>                          
                        </div>
                        <div class="row">
                        <div class="form-group col-sm-3 col-xs-12">
                            <label>Cantidad</label>
                            <input type="number" name="monto" id="monto" class="form-control" placeholder="Cantidad"  min="1" max="4" placeholder=" identificaion" required>
                            <input type="hidden"  id="valor" >
                        </div>
                        
                
                        <div class="form-group col-sm-3 col-xs-12">
                            <label>Fecha salida:</label>
                            <input type="text" class="form-control" name="fechapago" id="fechapago" required >

                          </div>
                        </div>
                  
                                        <script >
                      $('#fechapago').daterangepicker({
    "maxSpan": {
        "days": 8
    },
    "startDate": "04/10/2020",
    "endDate": "04/18/2020",
    "minDate": "04/02/2020"
}, function(start, end, label) {
  console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
});
                        </script>
                        
                        </script>
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
<script>
$(document).ready(function($){
var mont;
	$('#monto').keyup(function (e) {
		mont = $(this).val();
	 //console.log(mont)	  
	})

		$('select#interes').on('change',function(){
		     var valor = $(this).val(); 
			 var subt = mont * (valor/100);
			 var total = parseFloat(subt) + parseFloat(mont);			
			 $("#saldo").val(total);		
		})

sumaDias = function(d, fecha)
{
 var Fecha = new Date();
 var sFecha = fecha || (Fecha.getDate() + "-" + (Fecha.getMonth() +1) + "-" + Fecha.getFullYear());
 var sep = sFecha.indexOf('-') != -1 ? '-' : '-';
 var aFecha = sFecha.split(sep);
 var fecha = aFecha[2]+'-'+aFecha[1]+'-'+aFecha[0];
 fecha= new Date(fecha);
 fecha.setDate(fecha.getDate()+parseInt(d));
 var anno=fecha.getFullYear();
 var mes= fecha.getMonth()+1;
 var dia= fecha.getDate();
 mes = (mes < 10) ? ("0" + mes) : mes;
 dia = (dia < 10) ? ("0" + dia) : dia;
 var fechaFinal = dia+sep+mes+sep+anno;
 return (fechaFinal);
 }

 $('select#formapago').on('change',function(){
		     var valor = $(this).val(); 
			 if(valor == 'Diario'){
			 	$('#fechapago').val(sumaDias(1));
			 }
				 if(valor == 'Semanal'){
				 	$('#fechapago').val(sumaDias(7));
				 }
					 if(valor == 'Quincenal'){
					 	$('#fechapago').val(sumaDias(15));
					 }
						 if(valor == 'Mensual'){
						 	$('#fechapago').val(sumaDias(30));
						 }
		})

  $('select#plazo').on('change',function(){
		     var valor = $(this).val(); 
			 if(valor == 'Dia'){
			 	$('#fplazo').val(sumaDias(1));
			 }
				 if(valor == 'Semana'){
				 	$('#fplazo').val(sumaDias(7));
				 }
					 if(valor == 'Quincena'){
					 	$('#fplazo').val(sumaDias(15));
					 }
						 if(valor == 'Mes'){
						 	$('#fplazo').val(sumaDias(30));
						 }
		})
})
</script>
<script type="text/javascript" src="scripts/prestamos.js"></script>
<!--<script type="text/javascript" src="scripts/prestamos.js?v=<?php echo str_replace('.', '', microtime(true)); ?>"></script>-->

<?php 
}
ob_end_flush();
?>

<div class="footer4"> © 2020 Copyright: JAIME PARDO LEAL </div>
    <!-- Copyright -->
  
  </footer>
  <!-- Footer -->

</html>