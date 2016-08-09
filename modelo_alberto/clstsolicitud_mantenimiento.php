<?php
include_once('clsConexion.php');

class clssolicitud_mantenimiento extends clsConexion {

public $idsolicitud_repuesto;
public $nro_solicitud;
public $descripcion;
public $tipo_solicitud;
public $estatus;

public function incluir(){
 return parent::ejecutar("INSERT INTO solicitud_mantenimiento VALUES('$this->idsolicitud_repuesto','$this->nro_solicitud','$this->descripcion','2','$this->tipo_solicitud')");
 }


public function buscar(){
return parent::ejecutar("SELECT * FROM solicitud_mantenimiento WHERE nro_solicitud='$this->nro_solicitud'");
 }
public function modificar(){
return parent::ejecutar("UPDATE solicitud_mantenimiento SET nro_solicitud='$this->nro_solicitud',descripcion='$this->descripcion',estatus='$this->estatus' WHERE idsolicitud_repuesto='$this->idsolicitud_repuesto' ");
 }
public function eliminar(){
return parent::ejecutar("DELETE FROM solicitud_mantenimiento WHERE nro_solicitud='$this->nro_solicitud'");
 }
 public function listar_solicitudes(){
return parent::ejecutar("SELECT *  FROM  tmantenimiento_correctivo ");
 }


public function listar_solicitudes_mantenimiento(){
	return parent::ejecutar("SELECT tmantenimiento_correctivo. * , tfalla.descripcion
	FROM tmantenimiento_correctivo, tfalla
	WHERE tmantenimiento_correctivo.idfalla = tfalla.idfalla 
	ORDER BY tmantenimiento_correctivo.estatus ASC");
}

//buscar la solicitud
public function buscar_solicitud(){
	return parent::ejecutar("SELECT tdetalle_mantenimiento_correctivo. * , trepuesto_lubricante.nombre_repuesto, tmecanico.nombre1, tmecanico.nombre2
	FROM tdetalle_mantenimiento_correctivo, trepuesto_lubricante, tmecanico
	WHERE tdetalle_mantenimiento_correctivo.idmatenimiento_correctivo ='$this->nro_solicitud'
	AND tdetalle_mantenimiento_correctivo.idmecanico = tmecanico.idmecanico
	AND tdetalle_mantenimiento_correctivo.id_repuesto = trepuesto_lubricante.id_repuesto");
}



public function row(){
return  mysql_fetch_array($this->res);
 }
public function traer_codigo(){

return parent::ejecutar("SELECT MAX(idsolicitud_repuesto) AS idsolicitud_repuesto  FROM solicitud_mantenimiento");
 }
} 
 ?>