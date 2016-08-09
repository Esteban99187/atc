<?php
	include_once('clsConexionPg.php');
	class clstfalla extends clsConexionPg {
		public $idfalla,$descripcion,$estatus;

		public function incluir(){
			return $this->ejecutar("INSERT INTO tfalla(descripcion) VALUES('$this->descripcion')");
		}
		public function buscar(){
			$this->ejecutar("SELECT * FROM tfalla WHERE idfalla='$this->idfalla'");
			return $this->arreglo();
		}
		public function modificar(){
			return $this->ejecutar("UPDATE tfalla SET descripcion='$this->descripcion' WHERE idfalla='$this->idfalla' ");
		}
		public function eliminar($estatus) {
			return $this->ejecutar("UPDATE tfalla SET estatus = '$estatus' where idfalla='$this->idfalla'");
		}
		public function listar(){
			$this->ejecutar("SELECT *  FROM tfalla");
			return $this->matriz();
		}
	} 
?>