<?php

	include_once("clsConexion.php");
	class clstsolicitud extends clsConexion{


		public $nro_solicitud , $fecha_solicitud , $cedula_chofer,$observacion_solicitud, $placa_unidad, $estatus;


		//incluir
		public function incluir(){
			return parent::ejecutar("INSERT INTO tsolicitud VALUES('$this->nro_solicitud','$this->fecha_solicitud','$this->cedula_chofer','$this->placa_unidad','$this->observacion_solicitud','2') ");
		}


		//detalle de la transaccion
		public function incluir_detalle($nro, $repuesto, $cantidad){
			return parent::ejecutar("INSERT INTO tdetalle_solicitud VALUES('','$nro', '$repuesto','$cantidad') ");
		}

		public function listar(){
			return parent::ejecutar("SELECT tsolicitud. * , tchofer. *
			FROM tsolicitud, tchofer
			WHERE tsolicitud.cedula_chofer = tchofer.cedula ");		
		}

		//funcion para buscar
		public function buscar(){
			return parent::ejecutar("SELECT tsolicitud. * , tsolicitud.estatus AS estatus_solicitud, tchofer. *
			FROM tsolicitud, tchofer
			WHERE tsolicitud.nro_solicitud = '$this->nro_solicitud'
			AND tsolicitud.cedula_chofer = tchofer.cedula");
		}


		//funcion para traer el ultimo codigo de solicitud
		public function traer_codigo(){
			return parent::ejecutar("SELECT MAX(nro_solicitud) AS codigo  FROM tsolicitud");
 		}	

 		public function row(){
 			return mysql_fetch_array($this->res);
 		}


 		public function estatus_aprobacion(){
			return parent::ejecutar("UPDATE tsolicitud SET estatus='$this->estatus' WHERE nro_solicitud='$this->nro_solicitud'");
		}

		public function estatus_aprobacion_detalle(){
			return parent::ejecutar("UPDATE solicitud_mantenimiento SET estatus='$this->estatus' WHERE nro_solicitud='$this->nro_solicitud'");
		}




	}	
	



?>


