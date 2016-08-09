<?php
	include_once('clsConexionPg.php');
	class clsmarcacaucho extends clsConexionPg {
		public $idmarca,$descripcion;	

		public function incluir(){
		 	return $this->ejecutar("INSERT INTO tmarcacaucho(descripcion) VALUES('$this->descripcion')");
		}
		public function buscar(){
			$this->ejecutar("SELECT * FROM tmarcacaucho WHERE idmarca='$this->idmarca'");
			return $this->arreglo();
		}
		public function modificar(){
			return $this->ejecutar("UPDATE tmarcacaucho SET descripcion='$this->descripcion' WHERE idmarca='$this->idmarca' ");
		}
		public function eliminar($estatus){
			return $this->ejecutar("UPDATE tmarcacaucho SET estatus = '$estatus' where idmarca='$this->idmarca'");
		}
		public function listar(){
			$this->ejecutar("SELECT *  FROM tmarcacaucho");
			return $this->matriz();
		}
	} 
?>