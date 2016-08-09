<?php
include_once('clsConexion.php');

class clstipo_unidad extends clsConexion {

public $idtipo_unidad;
public $desc_tipo_unid;
public $idcapacidad;
public $estatus_tipuni;

public function incluir(){

 return parent::ejecutar("INSERT INTO tipo_unidad VALUES('$this->idtipo_unidad','$this->desc_tipo_unid','$this->idcapacidad','$this->estatus_tipuni')");

 }
public function buscar(){
return parent::ejecutar("SELECT * FROM tipo_unidad WHERE idtipo_unidad='$this->idtipo_unidad'");
 }

public function public function buscar(){
return parent::ejecutar("SELECT * FROM tipo_unidad WHERE idtipo_unidad='$this->idtipo_unidad'");
 }{
return parent::ejecutar("SELECT * FROM tipo_unidad WHERE desc_tipo_uni='$this->desc_tipo_uni'");
 }
public function modificar(){
return parent::ejecutar("UPDATE tipo_unidad SET desc_tipo_unid='$this->desc_tipo_unid',estatus_tipuni='$this->estatus_tipuni' WHERE idtipo_unidad='$this->idtipo_unidad'idcapacidad='$this->idcapacidad' ");
 }
public function eliminar(){
return parent::ejecutar("DELETE FROM tipo_unidad WHERE desc_tipo_uni='$this->desc_tipo_uni'");
 }
public function listar(){
return parent::ejecutar("SELECT *  FROM tipo_unidad");
 }
public function row(){
return  mysql_fetch_array($this->res);
 }
public function traer_codigo(){

return parent::ejecutar("SELECT MAX(idcapacidad) AS idcapacidad  FROM tipo_unidad");
 }
} 
 ?>