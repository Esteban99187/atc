<?php
	include_once('clsConexionPg.php');

	class clsmarca_unidad extends clsConexionPg {

		public $idmarca_unidad;
		public $desc_marc;
		public $estatus_maruni;

		public function incluir(){
			return $this->ejecutar("INSERT INTO marca_unidad VALUES('$this->idmarca_unidad','$this->desc_marc','$this->estatus_maruni')");
		}

		public function buscar(){
			$this->ejecutar("SELECT * FROM marca_unidad WHERE idmarca_unidad='$this->idmarca_unidad'");
			return $this->arreglo();
		}

		public function modificar(){
			return $this->ejecutar("UPDATE marca_unidad SET desc_marc='$this->desc_marc' WHERE idmarca_unidad='$this->idmarca_unidad' ");
		}
		public function eliminar(){
			return $this->ejecutar("DELETE FROM marca_unidad WHERE desc_marc='$this->desc_marc'");
		}
		public function listar(){
			$this->ejecutar("SELECT *  FROM marca_unidad order by 2");
			return $this->matriz();
		}

		public function traer_codigo(){
			$this->ejecutar("SELECT MAX(idmarca_unidad) AS idmarca_unidad FROM marca_unidad");
			return $this->arreglo();
		}
	} 
?>