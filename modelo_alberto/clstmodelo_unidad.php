<?php
	include_once('clsConexionPg.php');

	class clstmodelo_unidad extends clsConexionPg {

		public $idmodelo_unidad;
		public $idmarca_unidad;
		public $desc_mode;
		public $anio_modelo;
		public $estatus_moduni;

		public function incluir(){
			return parent::ejecutar("INSERT INTO modelo_unidad VALUES('$this->idmodelo_unidad','$this->desc_mode',$this->anio_modelo,'$this->estatus_moduni','$this->idmarca_unidad')");
		}
		public function buscar(){
			$this->ejecutar("SELECT * FROM modelo_unidad WHERE idmodelo_unidad='$this->idmodelo_unidad' ");
			return $this->arreglo();
	 	}
		public function modificar(){
			return parent::ejecutar("UPDATE modelo_unidad SET idmarca_unidad='$this->idmarca_unidad',desc_mode='$this->desc_mode',estatus_moduni='$this->estatus_moduni',anio_modelo='$this->anio_modelo' WHERE idmodelo_unidad='$this->idmodelo_unidad' ");
	 	}
		public function eliminar(){
			return parent::ejecutar("DELETE FROM modelo_unidad WHERE desc_mode='$this->desc_mode'");
	 	}
		public function listar(){
			parent::ejecutar("SELECT modelo_unidad.* , marca_unidad.desc_marc FROM modelo_unidad, marca_unidad WHERE modelo_unidad.idmarca_unidad = marca_unidad.idmarca_unidad");
			return $this->matriz();
	 	}
		
		public function traer_codigo(){
			parent::ejecutar("SELECT MAX(idmodelo_unidad) AS idmodelo_unidad  FROM modelo_unidad");
			return $this->arreglo();
	 	}
	} 
?>