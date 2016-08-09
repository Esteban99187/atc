<?php
	
	include_once("clsConexion.php");
	class clstdetalle_lubricantes extends clsConexion{

		public $placa_unidad, $idlubricante,$cant_km;

		function incluir(){
			return parent::ejecutar("INSERT INTO tdetalle_lubricante VALUES('','$this->placa_unidad','$this->idlubricante','$this->cant_km')");
		}


		public function listar(){
			return parent::ejecutar("SELECT  trepuesto.*, tmodelo_repuesto.nombre_modelo_repuesto AS modelo
			FROM trepuesto, tmodelo_repuesto,tdetalle_unidades_repuesto
			WHERE tdetalle_unidades_repuesto.placa_unidad = '$this->placa_unidad'
			AND tdetalle_unidades_repuesto.id_repuesto = trepuesto.id_repuesto
			AND trepuesto.id_modelo_repuesto = tmodelo_repuesto.id_modelo_repuesto");
		}

		//haremos el algoritmo con lubricantes multiples
		public function listar_lubricantes(){
			return parent::ejecutar("SELECT * FROM tdetalle_lubricante WHERE placa_unidad='$this->placa_unidad'");
		}

		//funcion para traernos los lubricantes de un usuario
		public function listar_lubricantes_usuario($P_Placa){
			return parent::ejecutar("SELECT tdetalle_lubricante. * , tlubricantes.nombre, tlubricantes.idlubricante
			FROM tdetalle_lubricante, tlubricantes
			WHERE tdetalle_lubricante.placa_unidad =  '$P_Placa'
			AND tdetalle_lubricante.idlubricante = tlubricantes.idlubricante");
		}	







		public function row(){
			return mysql_fetch_array($this->res);
		}
	}


?>