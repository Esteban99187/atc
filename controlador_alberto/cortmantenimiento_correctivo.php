<?php
include_once('../modelo_alberto/clstmantenimiento_correctivo.php');

$mitmantenimiento_correctivo= new clstmantenimiento_correctivo(); 
$mitmantenimiento_correctivo->idmatenimiento_correctivo= $_POST['idmatenimiento_correctivo'];
$mitmantenimiento_correctivo->placa= $_POST['placa'];
$mitmantenimiento_correctivo->idfalla= $_POST['idfalla'];
$mitmantenimiento_correctivo->estatus='1'; 
$mitmantenimiento_correctivo->fecha = $_POST['fecha'];
$mitmantenimiento_correctivo->observacion = $_POST['observacion'];

//realizaremos la transaccion
function transaccion(){
	include_once("../modelo_alberto/clsdetalle_mantenimiento_correctivo.php");
	$detalle = new clstdetalle_mantenimiento_correctivo();
	//haremos el registro del mantenimiento correctivo en la tabla detalle
	for($i=0; $i<count($_POST['id_repuestos']);$i++){

		 $detalle->id_repuesto = $_POST['id_repuestos'][$i];
		 $detalle->actividad = $_POST['actividads'][$i];
		 $detalle->kilometraje = $_POST['kilometrajes'][$i];
		 $detalle->cantidad = $_POST['cantidads'][$i];
		 $detalle->idmecanico = $_POST['mecanicos'][$i];
		 $detalle->fecha = $_POST['fechas'][$i];
		 $detalle->nota = $_POST['notas'][$i];
		 $detalle->unidad_medida = $_POST['unidad_medidas'][$i];
		 $detalle->idmatenimiento_correctivo = $_POST['idmatenimiento_correctivo'];

		 //incluimos la transaccion
		 $detalle->incluir();

	}

}




if($_POST['incluir']){
if($mitmantenimiento_correctivo->incluir()!=-1){
	$msj = 'registrado exitosamente';
	transaccion();
}else{
	$msj = 'No se pudo registrar el estado';
}
	
}

if($_POST['buscar']){
if($mitmantenimiento_correctivo->buscar()){
	$existe = 'yes';
 	$rows = $mitmantenimiento_correctivo->row();
 }else{ 
  $msj = 'No existe '; 
}
 }

if($_POST['modificar']){
if($mitmantenimiento_correctivo->modificar()){
	$msj = 'Modificacion exitosa';
 }else{ 
  $msj = 'No se pudo modificar '; 
}
 }

//aceptar
if($_POST['aceptar']){
	$mitmantenimiento_correctivo->estatus='2';
	$mitmantenimiento_correctivo->idmatenimiento_correctivo = $_GET['nro_solicitud'];
if($mitmantenimiento_correctivo->modificar_estatus_solicitud()){
	echo '<script> alert("Solicitud Aprobada"); </script>';
	echo "<script> window.location='?url=SOLICITUD_MATERIALES'; </script>";
 }else{ 
  $msj = 'No se pudo aprobar la solicitud '; 
}
}


 //rechazar
if($_POST['rechazar']){
	$mitmantenimiento_correctivo->estatus='3';
	$mitmantenimiento_correctivo->idmatenimiento_correctivo = $_GET['nro_solicitud'];
if($mitmantenimiento_correctivo->modificar_estatus_solicitud()){
	echo '<script> alert("Solicitud Rechazada"); </script>';
	echo "<script> window.location='?url=SOLICITUD_MATERIALES'; </script>";
 	
 }else{ 
  $msj = 'No se pudo rechazar la solicitud '; 
}
}



if($_POST['eliminar']){
if($mitmantenimiento_correctivo->eliminar()){
	$msj = 'Eliminacion exitosa';
 }else{ 
  $msj = 'No se pudo Eliminar '; 
}
 }
 ?>