<?php
	include_once('clsConexionPg.php');

	class clstmodelo_repuesto extends clsConexionPg {

		public $id_modelo_repuesto;
		public $id_marca_repuesto;
		public $nombre_modelo_repuesto;
		public $estatus;

		public function incluir(){
			return parent::ejecutar("INSERT INTO tmodelo_repuesto VALUES('$this->id_modelo_repuesto','$this->id_marca_repuesto','$this->nombre_modelo_repuesto','$this->estatus')");
		}
		public function buscar(){
			$this->ejecutar("SELECT * FROM tmodelo_repuesto WHERE id_modelo_repuesto='$this->id_modelo_repuesto' ");
			return $this->arreglo();
	 	}
		public function modificar(){
			return parent::ejecutar("UPDATE tmodelo_repuesto SET id_marca_repuesto='$this->id_marca_repuesto',nombre_modelo_repuesto='$this->nombre_modelo_repuesto',estatus='$this->estatus' WHERE id_modelo_repuesto='$this->id_modelo_repuesto' ");
	 	}
		public function eliminar(){
			return parent::ejecutar("DELETE FROM tmodelo_repuesto WHERE nombre_modelo_repuesto='$this->nombre_modelo_repuesto'");
	 	}
		public function listar(){
			parent::ejecutar("SELECT tmodelo_repuesto.* , tmarca_repuesto.nombre_marca_repuesto FROM tmodelo_repuesto, tmarca_repuesto WHERE tmodelo_repuesto.id_marca_repuesto = tmarca_repuesto.id_marca_repuesto");
			return $this->matriz();
	 	}

		public function listar_modelos_unidad(){
			return parent::ejecutar("SELECT tmodelo_repuesto. * 
			FROM tmodelo_repuesto, tmarca_repuesto
			WHERE tmodelo_repuesto.id_marca_repuesto = tmarca_repuesto.id_marca_repuesto
			AND tmarca_repuesto.tipo_marca =  '1'");
		}

		public function listar_modelos_repuestos(){
			return parent::ejecutar("SELECT tmodelo_repuesto. * 
			FROM tmodelo_repuesto, tmarca_repuesto
			WHERE tmodelo_repuesto.id_marca_repuesto = tmarca_repuesto.id_marca_repuesto");
		}
		
		public function traer_codigo(){
			parent::ejecutar("SELECT MAX(id_modelo_repuesto) AS id_modelo_repuesto  FROM tmodelo_repuesto");
			return $this->arreglo();
	 	}
	} 
?>