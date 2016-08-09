<?php
	include_once('clsConexionPg.php');

	class clstmantenimiento_preventivo extends clsConexionPg {

		public $iddetallepreventivo,$id_repuesto,$cantidad,$fecha,$idmecanico,$kilometraje,$idpreventivo;

		public function incluir(){
			return $this->ejecutar("INSERT INTO tmantenimiento_preventivo (id_repuesto,cantidad,fecha,idmecanico,kilometraje,idpreventivo) VALUES('$this->id_repuesto','$this->cantidad','$this->fecha','$this->idmecanico','$this->kilometraje','$this->idpreventivo')");
		}
		public function buscar(){
			$this->ejecutar("SELECT * FROM tmantenimiento_preventivo WHERE iddetallepreventivo='$this->iddetallepreventivo'");
			return $this->arreglo();
		}
		public function modificar(){
			return $this->ejecutar("UPDATE tmantenimiento_preventivo SET id_repuesto='$this->id_repuesto',cantidad='$this->cantidad',fecha='$this->fecha',idmecanico='$this->idmecanico',kilometraje='$this->kilometraje' WHERE iddetallepreventivo='$this->iddetallepreventivo' ");
		}
		public function eliminar(){
			return $this->ejecutar("DELETE FROM tmantenimiento_preventivo WHERE iddetallepreventivo='$this->iddetallepreventivo'");
		}
		public function listar(){
			$this->ejecutar("SELECT *  FROM tmantenimiento_preventivo");
			return $this->matriz();
		}
		public function listar_reporte_general(){
			$this->ejecutar("SELECT tregistro_diario. * , tchofer. * , unidad. * 
				FROM tregistro_diario, tchofer, unidad
				WHERE tregistro_diario.id_chofer = tchofer.id_chofer
				AND tregistro_diario.placa_unidad = unidad.placa");
			return $this->matriz();
		}

		public function listar_reporte($miplaca){
			$this->ejecutar("SELECT tregistro_diario. * , tchofer. * , unidad. * 
				FROM tregistro_diario, tchofer, unidad
				WHERE tregistro_diario.placa_unidad =  '$miplaca'
				AND tregistro_diario.id_chofer = tchofer.id_chofer
				AND tregistro_diario.placa_unidad = unidad.placa");
			return $this->matriz();
		}

		public function listar_reporte_placa_fecha($miplaca,$mifecha){
			$this->ejecutar("SELECT tregistro_diario. * , tchofer. * , unidad. * 
				FROM tregistro_diario, tchofer, unidad
				WHERE tregistro_diario.placa_unidad =  '$miplaca'
				AND tregistro_diario.id_chofer = tchofer.id_chofer
				AND tregistro_diario.placa_unidad = unidad.placa
				AND tregistro_diario.fecha='$mifecha' ");
			return $this->matriz();
		}

		public function listar_reporte_fecha($mifecha){
			$this->ejecutar("SELECT tregistro_diario. * , tchofer. * , unidad. * 
				FROM tregistro_diario, tchofer, unidad
				WHERE tregistro_diario.id_chofer = tchofer.id_chofer
				AND tregistro_diario.placa_unidad = unidad.placa
				AND tregistro_diario.fecha='$mifecha'");
			return $this->matriz();
		}

		public function traer_codigo(){
			return $this->ejecutar("SELECT MAX(iddetallepreventivo) AS iddetallepreventivo  FROM tmantenimiento_preventivo");
		}
	} 
?>