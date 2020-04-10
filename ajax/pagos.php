<?php
require_once "../modelos/Pagos.php";

$pago=new Pago();

//Variables
$idpago=isset($_POST["idpago"])? limpiarCadena($_POST["idpago"]):"";
$idprestamo=isset($_POST["idprestamo"])? limpiarCadena($_POST["idprestamo"]):"";
$usuario=isset($_POST["usuario"])? limpiarCadena($_POST["usuario"]):"";
$fecha=isset($_POST["fecha"])? limpiarCadena($_POST["fecha"]):"";
$cuota=isset($_POST["cuota"])? limpiarCadena($_POST["cuota"]):"";

switch($_GET["op"]){
        
    case 'guardaryeditar':
        if(empty($idpago)){
            $rspta=$pago->insertar($idprestamo,$usuario,$fecha,$cuota);
            echo $rspta ? "Sancion Registrada" : "Sancion No se Pudo Registrar";
        }
        else
        {
          $rspta=$pago->editar($idpago,$idprestamo,$usuario,$fecha,$cuota);
            echo $rspta ? "Sancion Actualizado" : "Sancion no se pudo actualizar";
        }
    break;
        
    case 'eliminar':
        $rspta=$pago->eliminar($idpago);
        echo $rspta ? "Sancion Eliminada" : "Sancion no se puede eliminar";
    break;
        
    case 'mostrar':
        $rspta=$pago->mostrar($idpago);
        //Codificar resultado con json
        echo json_encode($idpago);
    break;
        
    case 'listar':
        $rspta=$pago->listar();
        //declaracion de array
        $data=Array();
        
        while ($reg=$rspta->fetch_object()){
            $data[]=array(
           
            "0"=>$reg->cliente,
            "1"=>$reg->usuario,
            "2"=>$reg->fecha,
            "3"=>$reg->cuota);
        }
        $results = array(
        "sEcho"=>1, //Informacion para el datatables
            "iTotalRecords"=>count($data), //Enviamos el total registros al datatable
            "iTotalDisplayRecords"=>count($data), //Enviamos el total de registros a visualizar
            "aaData"=>$data);
        echo json_encode($results);
    break;
        
    case 'selectPrestamo':
        require_once "../modelos/Prestamos.php";
		$prestamo = new Prestamo();
		$rspta = $prestamo->select();
		while ($reg = $rspta->fetch_object())
        {
            echo '<option value=' . $reg->idprestamo . '>' . $reg->nombre . '</option>';
        }
	break;
}
?>