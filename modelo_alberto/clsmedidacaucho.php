<?php
	include_once('clsConexionPg.php');
	class clsmedidacaucho extends clsConexionPg {
		public $idMedida,$descripcion;

		public function incluir(){
		 	return $this->ejecutar("INSERT INTO tmedidacaucho(descripcion) VALUES('$this->descripcion')");
		}
		public function buscar(){
			$this->ejecutar("SELECT * FROM tmedidacaucho WHERE idmedida='$this->idMedida'");
			return $this->arreglo();
		}
		public function modificar(){
			return $this->ejecutar("UPDATE tmedidacaucho SET descripcion='$this->descripcion' WHERE idmedida='$this->idMedida' ");
		}
		public function eliminar($estatus){
			return $this->ejecutar("UPDATE tmedidacaucho SET estatus = '$estatus' where idmedida='$this->idMedida'");
		}
		public function listar(){
			$this->ejecutar("SELECT *  FROM tmedidacaucho");
			return $this->matriz();
		}
	} 
?>