<?php
include_once('../modelo_alberto/clstmantenimiento.php');
include_once("../modelo_alberto/clstregistro_diario.php");

//mantenimiento
$mitmantenimiento= new clstmantenimiento(); 
$mitmantenimiento->id_mantenimiento_preventivo= $_POST['id_mantenimiento_preventivo'];
$mitmantenimiento->placa_unidad= $_POST['placa_unidad'];
$mitmantenimiento->fecha_mantenimiento= $_POST['fecha_mantenimiento'];
$mitmantenimiento->descripcion_mantenimiento= $_POST['descripcion_mantenimiento'];
$mitmantenimiento->idlubricante= $_POST['idlubricante'];
$mitmantenimiento->kilometraje= $_POST['kilometraje'];


//registro diario
$mitregistro_diario = new clstregistro_diario();
$mitregistro_diario->id_tregistro_diario = $_GET['idregistrodiario'];




if($_POST['incluir']){

	if($mitmantenimiento->incluir()!=-1){
		$mitmantenimiento->cambiar_estatus_kilometraje($_POST['placa_unidad'], $_GET['lubricante']);
		$mitregistro_diario->actualizar_estatus_registro($mitregistro_diario->id_tregistro_diario);
		$msj = 'Mantenimiento Preventivo realizado exitosamente';
	}else{
		$msj = 'No se pudo registrar el estado';
	}
}


if($_POST['buscar']){
if($mitmantenimiento->buscar()){
	$existe = 'yes';
 	$rows = $mitmantenimiento->row();
 }else{ 
  $msj = 'No existe '; 
}
 }

if($_POST['modificar']){
if($mitmantenimiento->modificar()){
	$msj = 'Modificacion exitosa';
 }else{ 
  $msj = 'No se pudo modificar '; 
}
 }

if($_POST['eliminar']){
if($mitmantenimiento->eliminar()){
	$msj = 'Eliminacion exitosa';
 }else{ 
  $msj = 'No se pudo Eliminar '; 
}
 }
 ?>