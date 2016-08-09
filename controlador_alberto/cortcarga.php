<?php
include_once('../modelo_alberto/clstcarga.php');

$mitcarga= new clstcarga(); 

$mitcarga->idtcarga= $_POST['idtcarga'];
$mitcarga->nombre= $_POST['nombre'];
$mitcarga->placa_batea= $_POST['placa_batea'];
$mitcarga->placa_chacis= $_POST['placa_chacis'];


if($_POST['incluir']){
if($mitcarga->buscar()){
$msj ='ya existe un dato con ese nombre';
}else{
if($mitcarga->incluir()!=-1){
$msj = 'Registro exitoso';
}else{
$msj = 'Registro Fallido';
}
}
}

if($_POST['buscar']){
if($mitcarga->buscar()){
	$existe = 'yes';
 	$rows = $mitcarga->row();
 }else{ 
  $msj = 'No existe '; 
}
 }

if($_POST['modificar']){
if($mitcarga->modificar()){
	$msj = 'Modificacion exitosa';
 }else{ 
  $msj = 'No se pudo modificar '; 
}
 }

if($_POST['eliminar']){
if($mitcarga->eliminar()){
	$msj = 'Eliminacion exitosa';
 }else{ 
  $msj = 'No se pudo Eliminar '; 
}
 }
 ?>