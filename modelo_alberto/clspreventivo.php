<?php
	include_once('clsConexion.php');

	class preventivo extends clsConexion {

		public $idpreventivo,$fecha,$placa,$kilometraje,$observaciones;

		public function incluir(){
			return parent::ejecutar("INSERT INTO preventivo VALUES('$idpreventivo','$this->placa','$this->fecha','$this->kilometraje','$this->observaciones') ");
		}

		public function traer_codigo(){
			$this->ejecutar("SELECT MAX(idpreventivo) AS idpreventivo  FROM preventivo");
			return $this->arreglo();
		}

	} 
?>