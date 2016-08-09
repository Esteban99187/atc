<?php
include_once('clsConexion.php');

class clsunidad_medida extends clsConexion {

public $idunidad_medida;
public $desc_unid_medi;
public $estatus_unimed;

public function incluir(){

 return parent::ejecutar("INSERT INTO unidad_medida VALUES('$this->idunidad_medida','$this->desc_unid_medi','$this->estatus_unimed')");

 }
public function buscar(){
return parent::ejecutar("SELECT * FROM unidad_medida WHERE idunidad_medida='$this->idunidad_medida'");
 }
public function modificar(){
return parent::ejecutar("UPDATE unidad_medida SET desc_unid_medi='$this->desc_unid_medi',estatus_unimed='$this->estatus_unimed' WHERE idunidad_medida='$this->idunidad_medida' ");
 }
public function eliminar(){
return parent::ejecutar("DELETE FROM unidad_medida WHERE idunidad_medida='$this->idunidad_medida'");
 }
public function listar(){
return parent::ejecutar("SELECT *  FROM unidad_medida");
 }
public function row(){
return  mysql_fetch_array($this->res);
 }
public function traer_codigo(){

return parent::ejecutar("SELECT MAX(idunidad_medida) AS idunidad_medida  FROM unidad_medida");
 }
} 