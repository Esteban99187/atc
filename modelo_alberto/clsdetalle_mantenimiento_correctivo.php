<?php
include_once('clsConexion.php');

class clstdetalle_mantenimiento_correctivo extends clsConexion {

public $idtdetalle_mantenimiento_correctivo;
public $id_repuesto;
public $actividad;
public $kilometraje;
public $cantidad;
public $idmecanico;
public $fecha;
public $nota;
public $idmatenimiento_correctivo;
public $unidad_medida;

public function incluir(){

 return parent::ejecutar("INSERT INTO tdetalle_mantenimiento_correctivo VALUES('','$this->id_repuesto','$this->actividad','$this->kilometraje','$this->cantidad','$this->idmecanico','$this->fecha','$this->nota','$this->idmatenimiento_correctivo','$this->unidad_medida')");

 }
public function buscar(){
return parent::ejecutar("SELECT * FROM tdetalle_mantenimiento_correctivo WHERE idtdetalle_mantenimiento_correctivo='$this->idtdetalle_mantenimiento_correctivo'");
 }
public function modificar(){
return parent::ejecutar("UPDATE tdetalle_mantenimiento_correctivo SET id_repuesto='$this->id_repuesto',actividad='$this->actividad',kilometraje='$this->kilometraje',cantidad='$this->cantidad',idmecanico='$this->idmecanico',fecha='$this->fecha',nota='$this->nota',idmatenimiento_correctivo='$this->idmatenimiento_correctivo' WHERE idtdetalle_mantenimiento_correctivo='$this->idtdetalle_mantenimiento_correctivo' ");
 }
public function eliminar(){
return parent::ejecutar("DELETE FROM tdetalle_mantenimiento_correctivo WHERE idtdetalle_mantenimiento_correctivo='$this->idtdetalle_mantenimiento_correctivo'");
 }
public function listar(){
return parent::ejecutar("SELECT *  FROM tdetalle_mantenimiento_correctivo");
 }
public function row(){
return  mysql_fetch_array($this->res);
 }
public function traer_codigo(){

return parent::ejecutar("SELECT MAX(idtdetalle_mantenimiento_correctivo) AS idtdetalle_mantenimiento_correctivo  FROM tdetalle_mantenimiento_correctivo");
 }
} 
 ?>