<?php
include_once('clsConexion.php');

class clstmantenimiento extends clsConexion {

public $id_mantenimiento_preventivo;
public $placa_unidad;
public $fecha_mantenimiento;
public $descripcion_mantenimiento;
public $idlubricante;
public $kilometraje;

public function incluir(){

 return parent::ejecutar("INSERT INTO tmantenimiento VALUES('$this->id_mantenimiento_preventivo','$this->placa_unidad','$this->fecha_mantenimiento','$this->descripcion_mantenimiento','$this->idlubricante','$this->kilometraje')");

 }
public function buscar(){
return parent::ejecutar("SELECT * FROM tmantenimiento WHERE id_mantenimiento_preventivo='$this->id_mantenimiento_preventivo'");
 }
public function modificar(){
return parent::ejecutar("UPDATE tmantenimiento SET placa_unidad='$this->placa_unidad',fecha_mantenimiento='$this->fecha_mantenimiento',descripcion_mantenimiento='$this->descripcion_mantenimiento',idlubricante='$this->idlubricante',kilometraje='$this->kilometraje' WHERE id_mantenimiento_preventivo='$this->id_mantenimiento_preventivo' ");
 }
public function eliminar(){
return parent::ejecutar("DELETE FROM tmantenimiento WHERE placa_unidad='$this->placa_unidad'");
 }
public function listar(){
return parent::ejecutar("SELECT *  FROM tmantenimiento");
 }


public function listar_mantenimiento_preventivo(){
	return parent::ejecutar("SELECT tmantenimiento. * , tlubricantes.nombre AS lubricante, tchofer.nombre1, tchofer.nombre2, tchofer.cedula
	FROM tmantenimiento, tlubricantes, tchofer, tasignacion_unidad
	WHERE tmantenimiento.idlubricante = tlubricantes.idlubricante
	AND tmantenimiento.placa_unidad = tasignacion_unidad.placa_unidad
	AND tasignacion_unidad.cedula_chofer = tchofer.cedula");
}



//segun la placa
public function listar_mantenimiento_preventivo_numero($miplaca){
	return parent::ejecutar("SELECT tmantenimiento. * , tlubricantes.nombre AS lubricante, tchofer.nombre1, tchofer.nombre2, tchofer.cedula
	FROM tmantenimiento, tlubricantes, tchofer, tasignacion_unidad
	WHERE tmantenimiento.placa_unidad = '$miplaca'
	AND tmantenimiento.idlubricante = tlubricantes.idlubricante
	AND tmantenimiento.placa_unidad = tasignacion_unidad.placa_unidad
	AND tasignacion_unidad.cedula_chofer = tchofer.cedula");
}




//numero fecha
public function listar_mantenimiento_preventivo_numero_fecha($miplaca,$mifecha){
	$fecha_temp = date("Y-m-d");
	return parent::ejecutar("SELECT tmantenimiento. * , tlubricantes.nombre AS lubricante, tchofer.nombre1, tchofer.nombre2, tchofer.cedula
	FROM tmantenimiento, tlubricantes, tchofer, tasignacion_unidad
	WHERE tmantenimiento.placa_unidad = '$miplaca'
	AND tmantenimiento.idlubricante = tlubricantes.idlubricante
	AND tmantenimiento.placa_unidad = tasignacion_unidad.placa_unidad
	AND tasignacion_unidad.cedula_chofer = tchofer.cedula
	AND tmantenimiento.fecha_mantenimiento BETWEEN '$mifecha' AND '$fecha_temp'");
}




//mostrar general por fecha
public function listar_mantenimiento_fecha($mifecha){
	$fecha_temp = date("Y-m-d");

	return parent::ejecutar("SELECT tmantenimiento. * , tlubricantes.nombre AS lubricante, tchofer.nombre1, tchofer.nombre2, tchofer.cedula
	FROM tmantenimiento, tlubricantes, tchofer, tasignacion_unidad
	WHERE tmantenimiento.idlubricante = tlubricantes.idlubricante
	AND tmantenimiento.placa_unidad = tasignacion_unidad.placa_unidad
	AND tasignacion_unidad.cedula_chofer = tchofer.cedula
	AND tmantenimiento.fecha_mantenimiento ='$mifecha'");
}






//busccar reporte mantenimiento
public function buscar_reporte_mantenimiento(){
	return parent::ejecutar("SELECT tmantenimiento. * , tlubricantes.nombre AS lubricante, tchofer.nombre1, tchofer.nombre2, tchofer.cedula
	FROM tmantenimiento, tlubricantes, tchofer, tasignacion_unidad
	WHERE tmantenimiento.id_mantenimiento_preventivo = '$this->id_mantenimiento_preventivo'
	AND tmantenimiento.idlubricante = tlubricantes.idlubricante
	AND tmantenimiento.placa_unidad = tasignacion_unidad.placa_unidad
	AND tasignacion_unidad.cedula_chofer = tchofer.cedula");	
}



//cambiar estatus kilometraje
 public function cambiar_estatus_kilometraje($miplaca,$lubricante){
 	return parent::ejecutar("UPDATE tregistro_diario SET estatus='1' WHERE placa_unidad='$miplaca' AND estatus='2' AND idlubricante='$lubricante' ");
 }

public function row(){
return  mysql_fetch_array($this->res);
 }
public function traer_codigo(){

return parent::ejecutar("SELECT MAX(id_mantenimiento_preventivo) AS id_mantenimiento_preventivo  FROM tmantenimiento");
 }
} 
 ?>