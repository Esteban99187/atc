<?php
include_once('clsConexion.php');

class clscapacidad extends clsConexion {

public $idcapacidad;
public $capacidad;
public $idunidad_medida;
public $estatus_cap;

public function incluir(){

 return parent::ejecutar("INSERT INTO capacidad VALUES('$this->idcapacidad','$this->capacidad','$this->idunidad_medida','$this->estatus_cap')");

 }
public function buscar(){
return parent::ejecutar("SELECT * FROM capacidad WHERE idcapacidad='$this->idcapacidad'idunidad_medida='$this->idunidad_medida'");
 }
public function modificar(){
return parent::ejecutar("UPDATE capacidad SET capacidad='$this->capacidad',estatus_cap='$this->estatus_cap' WHERE idcapacidad='$this->idcapacidad'idunidad_medida='$this->idunidad_medida' ");
 }
public function eliminar(){
return parent::ejecutar("DELETE FROM capacidad WHERE idcapacidad='$this->idcapacidad'idunidad_medida='$this->idunidad_medida'");
 }
public function listar(){
return parent::ejecutar("SELECT *  FROM capacidad");
 }
public function row(){
return  mysql_fetch_array($this->res);
 }
public function traer_codigo(){

return parent::ejecutar("SELECT MAX(idunidad_medida) AS idunidad_medida  FROM capacidad");
 }
} 
 ?>