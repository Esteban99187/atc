<?php
	include_once('clsConexionPg.php');

	class clstmarca extends clsConexionPg {

		public $id_marca_repuesto;
		public $nombre_marca;
		public $estatus;
		public $tipo_marca;

		public function incluir(){
			return $this->ejecutar("INSERT INTO tmarca_repuesto VALUES('$this->id_marca_repuesto','$this->nombre_marca','$this->estatus')");
		}

		public function buscar(){
			$this->ejecutar("SELECT * FROM tmarca_repuesto WHERE id_marca_repuesto='$this->id_marca_repuesto'");
			return $this->arreglo();
		}

		public function buscar_marca($tipo){
			return $this->ejecutar("SELECT * FROM tmarca_repuesto WHERE tipo_marca='$tipo'");
		}

		public function modificar(){
			return $this->ejecutar("UPDATE tmarca_repuesto SET nombre_marca_repuesto='$this->nombre_marca'  WHERE id_marca_repuesto='$this->id_marca_repuesto' ");
		}
		public function eliminar(){
			return $this->ejecutar("DELETE FROM tmarca_repuesto WHERE nombre_marca_repuesto='$this->nombre_marca'");
		}
		public function listar(){
			$this->ejecutar("SELECT *  FROM tmarca_repuesto order by 2");
			return $this->matriz();
		}

		public function traer_codigo(){
			$this->ejecutar("SELECT MAX(id_marca_repuesto) AS id_marca_repuesto  FROM tmarca_repuesto");
			return $this->arreglo();
		}
	} 
?>