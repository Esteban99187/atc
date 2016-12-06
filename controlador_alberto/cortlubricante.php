<?php
include_once('../modelo_alberto/clstlubricantes.php');

$mitlubricantes= new clstlubricantes(); 

$mitlubricantes->idlubricante= $_POST['idlubricante'];
$mitlubricantes->nombre= $_POST['nombre'];
$mitlubricantes->cant_km= $_POST['cant_km'];

//funcion incluir transaccion
function transaccion(){
	include_once("../modelo_alberto/clstdetalle_unidades_repuesto.php");
	$detalle = new clstdetalle_unidades_repuesto();
	//recorremos el arreglo
	for($i=0; $i<count($_POST['idmodelo_unidads[]']); $i++){
		$detalle->idmodelo_unidad = $_POST['modelo_unidad'][$i];
		$detalle->id_repuesto     = $_POST['idlubricante'];
		$detalle->cantidad        =  $_POST['cantidad'][$i];
		$detalle->kmax            =  $_POST['kmaximo'][$i];
		$detalle->kmin            =  $_POST['kminimo'][$i];
		$detalle->estatus = 1;
		$detalle->incluir();
	}
}


if($_POST['guardar']){
	if($mitlubricantes->buscar()){
		$msj ='ya existe un dato con ese nombre';
	}else{
		if($mitlubricantes->incluir()!=-1){
			$msj = 'Lubricante Registrado Exitosamente';
			//llamamos a la mini transaccion
			//transaccion();
		}else{
			$msj = 'No se pudo registrar el libricantes';
		}
}
}

if($_POST['buscar']){
if($mitlubricantes->buscar()){
	$existe = 'yes';
 	$rows = $mitlubricantes->row();
 }else{ 
  $msj = 'No existe '; 
}
 }

if($_POST['modificar']){
if($mitlubricantes->modificar()){
	$msj = 'Modificacion exitosa';
 }else{ 
  $msj = 'No se pudo modificar '; 
}
 }

if($_POST['eliminar']){
if($mitlubricantes->eliminar()){
	$msj = 'Eliminacion exitosa';
 }else{ 
  $msj = 'No se pudo Eliminar '; 
}
 }
 ?>