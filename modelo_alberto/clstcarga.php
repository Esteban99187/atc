<?php
include_once('clsConexion.php');

class clstcarga extends clsConexion {

public $idtcarga;
public $nombre;
public $placa_batea;
public $placa_chacis;

public function incluir(){

 return parent::ejecutar("INSERT INTO tcarga VALUES('$this->idtcarga','$this->nombre','$this->placa_batea','$this->placa_chacis')");

 }
public function buscar(){
return parent::ejecutar("SELECT * FROM tcarga WHERE nombre='$this->nombre'");
 }
public function modificar(){
return parent::ejecutar("UPDATE tcarga SET nombre='$this->nombre',placa_batea='$this->placa_batea',placa_chacis='$this->placa_chacis' WHERE idtcarga='$this->idtcarga' ");
 }
public function eliminar(){
return parent::ejecutar("DELETE FROM tcarga WHERE nombre='$this->nombre'");
 }
public function listar(){
return parent::ejecutar("SELECT *  FROM tcarga");
 }
public function row(){
return  mysql_fetch_array($this->res);
 }
public function traer_codigo(){

return parent::ejecutar("SELECT MAX(idtcarga) AS idtcarga  FROM tcarga");
 }
} 
 ?>