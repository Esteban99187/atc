<?php
include_once('clsConexion.php');

class clstdetalle_carga extends clsConexion {

public $idtdetallecarga;
public $placa_unidad;
public $idtcarga;
public $fecha_asignacion;

public function incluir(){

 return parent::ejecutar("INSERT INTO tdetalle_carga VALUES('$this->idtdetallecarga','$this->placa_unidad','$this->idtcarga','$this->fecha_asignacion')");

 }
public function buscar(){
return parent::ejecutar("SELECT tdetalle_carga. * , tchofer.cedula, tchofer.nombre1, tchofer.nombre2, tcarga.nombre AS carga
	FROM tdetalle_carga, tchofer, tasignacion_unidad, tcarga
	WHERE tdetalle_carga.idtdetallecarga = '$this->idtdetallecarga' 
	AND tdetalle_carga.idtcarga = tcarga.idtcarga
	AND tasignacion_unidad.placa_unidad = tdetalle_carga.placa_unidad
	AND tasignacion_unidad.cedula_chofer = tchofer.cedula");
 }
public function modificar(){
return parent::ejecutar("UPDATE tdetalle_carga SET placa_unidad='$this->placa_unidad',idtcarga='$this->idtcarga',fecha_asignacion='$this->fecha_asignacion' WHERE idtdetallecarga='$this->idtdetallecarga' ");
 }
public function eliminar(){
return parent::ejecutar("DELETE FROM tdetalle_carga WHERE placa_unidad='$this->placa_unidad'");
 }
public function listar(){
	return parent::ejecutar("SELECT tdetalle_carga. * , tchofer.cedula, tchofer.nombre1, tchofer.nombre2, tcarga.nombre AS carga
	FROM tdetalle_carga, tchofer, tasignacion_unidad, tcarga
	WHERE tdetalle_carga.idtcarga = tcarga.idtcarga
	AND tasignacion_unidad.placa_unidad = tdetalle_carga.placa_unidad
	AND tasignacion_unidad.cedula_chofer = tchofer.cedula");

 }
public function row(){
return  mysql_fetch_array($this->res);
 }
public function traer_codigo(){

return parent::ejecutar("SELECT MAX(idtdetallecarga) AS idtdetallecarga  FROM tdetalle_carga");
 }
} 
 ?>