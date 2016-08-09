<?php
include_once('../modelo_alberto/clstipo_unidad.php');

$mitipo_unidad= new clstipo_unidad(); 

$mitipo_unidad->idtipo_unidad= $_POST['idtipo_unidad'];
$mitipo_unidad->desc_tipo_unid= $_POST['desc_tipo_unid'];
$mitipo_unidad->idcapacidad= $_POST['idcapacidad'];
$mitipo_unidad->estatus_tipuni=''; 


if($_POST['incluir']){
if($mitipo_unidad->buscarpornombre(){
$msj ='ya existe un dato con ese nombre';
}else{
if($mitipo_unidad->incluir()!=-1){
$msj = 'registrado exitosamente';
}else{
$msj = 'No se pudo registrar el estado';
}
}
}

if($_POST['buscar']){
if($mitipo_unidad->buscar()){
	$existe = 'yes';
 	$rows = $mitipo_unidad->row();
 }else{ 
  $msj = 'No existe '; 
}
 }

if($_POST['modificar']){
if($mitipo_unidad->modificar()){
	$msj = 'Modificacion exitosa';
 }else{ 
  $msj = 'No se pudo modificar '; 
}
 }

if($_POST['eliminar']){
if($mitipo_unidad->eliminar()){
	$msj = 'Eliminacion exitosa';
 }else{ 
  $msj = 'No se pudo Eliminar '; 
}
 }
 ?>