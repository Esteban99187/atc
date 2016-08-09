<?php
include_once('clsConexion.php');

class clstasignacion_unidad extends clsConexion {

public $id_asignacion_unidad;
public $cedula_chofer;
public $placa_unidad;
public $fecha_asignacion;
public $fecha_desasignacion;

public function incluir(){

 return parent::ejecutar("INSERT INTO tasignacion_unidad VALUES('$this->id_asignacion_unidad','$this->cedula_chofer','$this->placa_unidad','$this->fecha_asignacion','$this->fecha_desasignacion','1')");

 }




//comprobaremos si una unidad  ya esta asignada a una persona
public function comprobar_unidad(){
	return parent::ejecutar("SELECT * FROM tasignacion_unidad WHERE cedula_chofer='$this->cedula_chofer' AND estatus='1'");
}



//comprobaremos si una unidad  ya esta asignada a una person
public function buscar_unidad_asignada(){
	return parent::ejecutar("SELECT * FROM tasignacion_unidad WHERE placa_unidad='$this->placa_unidad'");
 }




public function buscar(){
return parent::ejecutar("SELECT tasignacion_unidad.*,tchofer.nombre1 AS nombre FROM tasignacion_unidad, tchofer WHERE tasignacion_unidad.cedula_chofer='$this->cedula_chofer' AND tasignacion_unidad.cedula_chofer=tchofer.cedula ");
 }
public function modificar(){
return parent::ejecutar("UPDATE tasignacion_unidad SET cedula_chofer='$this->cedula_chofer',placa_unidad='$this->placa_unidad',fecha_asignacion='$this->fecha_asignacion',fecha_desasignacion='$this->fecha_desasignacion' WHERE id_asignacion_unidad='$this->id_asignacion_unidad' ");
 }
public function eliminar(){
return parent::ejecutar("DELETE FROM tasignacion_unidad WHERE cedula_chofer='$this->cedula_chofer'");
 }
public function listar(){
return parent::ejecutar("SELECT *  FROM tasignacion_unidad");
 }


//lista de asignacioens
public function lista_asignacion(){
	return parent::ejecutar("SELECT tasignacion_unidad. * , tchofer.nombre1, tchofer.nombre2
	FROM tasignacion_unidad, tchofer
	WHERE tasignacion_unidad.cedula_chofer = tchofer.cedula");
}


public function row(){
return  mysql_fetch_array($this->res);
 }
public function traer_codigo(){

return parent::ejecutar("SELECT MAX(id_asignacion_unidad) AS id_asignacion_unidad  FROM tasignacion_unidad");
 }
} 
 ?>