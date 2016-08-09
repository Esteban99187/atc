<?php
include_once('clsConexion.php');

class clsmodelo_unidad extends clsConexion {

public $idmodelo_unidad;
public $desc_mode;
public $ano_mode;
public $estatus_moduni;
public $idmarca_unidad;

public function incluir(){

 return parent::ejecutar("INSERT INTO modelo_unidad VALUES('$this->idmodelo_unidad','$this->desc_mode','$this->ano_mode','$this->estatus_moduni','$this->idmarca_unidad')");

 }
public function buscar(){
return parent::ejecutar("SELECT * FROM modelo_unidad WHERE idmodelo_unidad='$this->idmodelo_unidad'idmarca_unidad='$this->idmarca_unidad'");
 }
public function modificar(){
return parent::ejecutar("UPDATE modelo_unidad SET desc_mode='$this->desc_mode',ano_mode='$this->ano_mode',estatus_moduni='$this->estatus_moduni' WHERE idmodelo_unidad='$this->idmodelo_unidad'idmarca_unidad='$this->idmarca_unidad' ");
 }
public function eliminar(){
return parent::ejecutar("DELETE FROM modelo_unidad WHERE idmodelo_unidad='$this->idmodelo_unidad'idmarca_unidad='$this->idmarca_unidad'");
 }
public function listar(){
return parent::ejecutar("SELECT *  FROM modelo_unidad");
 }
public function row(){
return  mysql_fetch_array($this->res);
 }
public function traer_codigo(){

return parent::ejecutar("SELECT MAX(idmarca_unidad) AS idmarca_unidad  FROM modelo_unidad");
 }
} 
 ?>