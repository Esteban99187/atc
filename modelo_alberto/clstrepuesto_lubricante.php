<?php
	include_once('clsConexionPg.php');

	class clstrepuesto_lubricante extends clsConexionPg {

		public $id_repuesto,$id_modelo_repuesto,$nombre_repuesto,$estatus,$tipo_repuesto,$tipo_lubricante,$idunidad_medida,$stock_min,$stock_max;

		public function incluir(){
		 	return $this->ejecutar("INSERT INTO trepuesto_lubricante (id_modelo_repuesto,nombre_repuesto,tipo_repuesto,tipo_lubricante,idunidad_medida,stock_min,stock_max) VALUES($this->id_modelo_repuesto,'$this->nombre_repuesto',$this->tipo_repuesto,$this->tipo_lubricante,$this->idunidad_medida,$this->stock_min,$this->stock_max)");
		}
		public function incluirLubricante(){
			return $this->ejecutar("INSERT INTO trepuesto_lubricante(nombre_repuesto,tipo_repuesto,tipo_lubricante,idunidad_medida,stock_min,stock_max) VALUES('$this->nombre_repuesto',2,$this->tipo_lubricante,$this->idunidad_medida,$this->stock_min,$this->stock_max)");
		}
		public function buscar(){
			$this->ejecutar("SELECT rl.*,mar.id_marca_repuesto as marca 
				FROM trepuesto_lubricante as rl
				left join tmodelo_repuesto as mlr on rl.id_modelo_repuesto = mlr.id_modelo_repuesto
				left join tmarca_repuesto as mar on mlr.id_marca_repuesto = mar.id_marca_repuesto
				WHERE id_repuesto=$this->id_repuesto");
			return $this->arreglo();
		}
		public function modificar(){
			return $this->ejecutar("UPDATE trepuesto_lubricante SET nombre_repuesto='$this->nombre_repuesto',tipo_lubricante=$this->tipo_lubricante,tipo_repuesto=$this->tipo_repuesto, idunidad_medida=$this->idunidad_medida,stock_min='$this->stock_min',stock_max='$this->stock_max' WHERE id_repuesto=$this->id_repuesto ");
		}
		public function eliminar(){
			return $this->ejecutar("DELETE FROM trepuesto_lubricante WHERE nombre_repuesto='$this->nombre_repuesto'");
		}
		public function listar(){
			$this->ejecutar("SELECT trepuesto_lubricante. * , tmodelo_repuesto. * 
			FROM trepuesto_lubricante, tmodelo_repuesto
			WHERE trepuesto_lubricante.id_modelo_repuesto = tmodelo_repuesto.id_modelo_repuesto 
			AND trepuesto_lubricante.tipo_repuesto = 1");
			return $this->matriz();
		}

		public function listar_lubricantes(){
		 	$this->ejecutar("SELECT trepuesto_lubricante. * 
			FROM trepuesto_lubricante
			WHERE trepuesto_lubricante.tipo_repuesto = 2");
			return $this->matriz();
		}
		public function listar_repuestos(){
		 	$this->ejecutar("SELECT trepuesto_lubricante. * 
			FROM trepuesto_lubricante
			WHERE trepuesto_lubricante.tipo_repuesto = 1");
			return $this->matriz();
		}
		
		public function traer_codigo(){
			$this->ejecutar("SELECT MAX(id_repuesto) AS id_repuesto  FROM trepuesto_lubricante");
			return $this->arreglo();
		}
		public function buscarPor($valor,$por){
			$this->ejecutar("SELECT * from trepuesto_lubricante where $por='$valor'");
			return $this->arreglo();
		}
	} 
?>