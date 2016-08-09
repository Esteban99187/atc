<?php
include_once('../modelo_alberto/clstasignacion_unidad.php');

$mitasignacion_unidad= new clstasignacion_unidad(); 

$mitasignacion_unidad->id_asignacion_unidad= $_POST['id_asignacion_unidad'];
$mitasignacion_unidad->cedula_chofer= $_POST['cedula_chofer'];
$mitasignacion_unidad->placa_unidad= $_POST['placa_unidad'];
$mitasignacion_unidad->fecha_asignacion= $_POST['fecha_asignacion'];
$mitasignacion_unidad->fecha_desasignacion= $_POST['fecha_desasignacion'];


if($_POST['incluir']){
	if($mitasignacion_unidad->comprobar_unidad()){
		$msj ='Ya este usuario tiene una unidad asignada';
		}else{
	if($mitasignacion_unidad->incluir()!=-1){
		$msj = 'Unidad asignada exitosamente';
	}else{
		$msj = 'No se pudo registrar el estado';
	}
	}
}



if($_POST['buscar']){
if($mitasignacion_unidad->buscar()){
	$existe = 'yes';
 	$rows = $mitasignacion_unidad->row();
 }else{ 
  $msj = 'No existe '; 
}
 }

if($_POST['modificar']){
if($mitasignacion_unidad->modificar()){
	$msj = 'Modificacion exitosa';
 }else{ 
  $msj = 'No se pudo modificar '; 
}
 }

if($_POST['eliminar']){
if($mitasignacion_unidad->eliminar()){
	$msj = 'Eliminacion exitosa';
 }else{ 
  $msj = 'No se pudo Eliminar '; 
}
 }
 ?>