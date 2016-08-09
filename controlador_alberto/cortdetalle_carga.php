<?php
include_once('../modelo_alberto/clstdetalle_carga.php');

$mitdetalle_carga= new clstdetalle_carga(); 

$mitdetalle_carga->idtdetallecarga= $_POST['idtdetallecarga'];
$mitdetalle_carga->placa_unidad= $_POST['placa_unidad'];
$mitdetalle_carga->idtcarga= $_POST['idtcarga'];
$mitdetalle_carga->fecha_asignacion= $_POST['fecha_asignacion'];


if($_POST['incluir']){
if($mitdetalle_carga->buscar()){
$msj ='ya existe un dato con ese nombre';
}else{
if($mitdetalle_carga->incluir()!=-1){
$msj = 'Registrado exitosamente';
}else{
$msj = 'No se pudo registrar';
}
}
}

if($_POST['buscar']){
if($mitdetalle_carga->buscar()){
	$existe = 'yes';
 	$rows = $mitdetalle_carga->row();
 }else{ 
  $msj = 'No existe '; 
}
 }

if($_POST['modificar']){
if($mitdetalle_carga->modificar()){
	$msj = 'Modificacion exitosa';
 }else{ 
  $msj = 'No se pudo modificar '; 
}
 }

if($_POST['eliminar']){
if($mitdetalle_carga->eliminar()){
	$msj = 'Eliminacion exitosa';
 }else{ 
  $msj = 'No se pudo Eliminar '; 
}
 }
 ?>