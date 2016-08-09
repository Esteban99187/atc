<?php
include_once('clsConexion.php');

class clstmantenimiento_correctivo extends clsConexion {

public $idmatenimiento_correctivo;
public $placa;
public $idfalla;
public $estatus;
public $fecha;
public $observacion;

public function incluir(){

 return parent::ejecutar("INSERT INTO tmantenimiento_correctivo VALUES('$this->idmatenimiento_correctivo','$this->placa','$this->idfalla','$this->estatus','$this->fecha','$this->observacion')");

 }
public function buscar(){
	return parent::ejecutar("SELECT * FROM tmantenimiento_correctivo WHERE placa='$this->placa'");
}
//buscar datos
public function buscar_mantenimiento(){
	return parent::ejecutar("SELECT tmantenimiento_correctivo.*, tfalla.descripcion FROM tmantenimiento_correctivo, tfalla WHERE tmantenimiento_correctivo.idmatenimiento_correctivo='$this->idmatenimiento_correctivo' AND tmantenimiento_correctivo.idfalla = tfalla.idfalla");
}

public function modificar(){
return parent::ejecutar("UPDATE tmantenimiento_correctivo SET placa='$this->placa',idfalla='$this->idfalla',estatus='$this->estatus' WHERE idmatenimiento_correctivo='$this->idmatenimiento_correctivo' ");
}


public function modificar_estatus_solicitud(){
	return parent::ejecutar("UPDATE tmantenimiento_correctivo SET estatus='$this->estatus'  WHERE idmatenimiento_correctivo='$this->idmatenimiento_correctivo' ");
}

public function eliminar(){
return parent::ejecutar("DELETE FROM tmantenimiento_correctivo WHERE placa='$this->placa'");
 }
public function listar(){
return parent::ejecutar("SELECT *  FROM tmantenimiento_correctivo");
 }
public function row(){
return  mysql_fetch_array($this->res);
 }
public function traer_codigo(){

return parent::ejecutar("SELECT MAX(idmatenimiento_correctivo) AS idmatenimiento_correctivo  FROM tmantenimiento_correctivo");
 }
} 
 ?>