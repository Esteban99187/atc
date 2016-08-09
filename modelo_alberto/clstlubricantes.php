<?php
include_once('clsConexion.php');

class clstlubricantes extends clsConexion {

public $idlubricante;
public $nombre;
public $cant_km;

public function incluir(){

 return parent::ejecutar("INSERT INTO tlubricantes VALUES('$this->idlubricante','$this->nombre','$this->cant_km')");

 }
public function buscar(){
return parent::ejecutar("SELECT * FROM tlubricantes WHERE nombre='$this->nombre'");
 }
 public function buscar_lubricante(){
	return parent::ejecutar("SELECT * FROM tlubricantes WHERE idlubricante='$this->idlubricante'");

 }
public function modificar(){
return parent::ejecutar("UPDATE tlubricantes SET nombre='$this->nombre',cant_km='$this->cant_km' WHERE idlubricante='$this->idlubricante' ");
 }
public function eliminar(){
return parent::ejecutar("DELETE FROM tlubricantes WHERE nombre='$this->nombre'");
 }
public function listar(){
return parent::ejecutar("SELECT *  FROM tlubricantes");
 }
public function row(){
return  mysql_fetch_array($this->res);
 }
public function traer_codigo(){

return parent::ejecutar("SELECT MAX(idlubricante) AS idlubricante  FROM tlubricantes");
 }
} 
 ?>