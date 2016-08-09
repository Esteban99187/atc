<?php
	include_once('clsConexionPg.php');
	class clstdetallefalla extends clsConexionPg {
		public $iddetallefalla,$idfalla,$idmodelo_unidad,$id_repuesto,$cantidad;
		public function incluir(){
			return $this->ejecutar("INSERT INTO tdetallefalla(idfalla,idmodelo_unidad,id_repuesto,cantidad) VALUES($this->idfalla,$this->idmodelo_unidad,$this->id_repuesto,$this->cantidad)");
		}		
		public function modificar(){
			return $this->ejecutar("UPDATE tdetallefalla SET iddetallefalla='$this->iddetallefalla',idfalla='$this->idfalla',idmodelo_unidad='$this->idmodelo_unidad',id_repuesto='$this->id_repuesto',cantidad='$this->cantidad' WHERE  ");
		}
		public function eliminarDetalle(){
			return $this->ejecutar("DELETE FROM tdetallefalla where idfalla = '$this->idfalla'");
		}
		public function eliminar(){
			return $this->ejecutar("DELETE FROM tdetallefalla WHERE iddetallefalla='$this->iddetallefalla'");
		}
		public function listar(){
			$this->ejecutar("SELECT * FROM tdetallefalla");
			return $this->matriz();
		}
		public function traer_codigo(){
			$this->ejecutar("SELECT MAX(idtadministracion_falla) AS idtadministracion_falla  FROM tdetallefalla");
			return $this->arreglo();
		}
	} 
?>