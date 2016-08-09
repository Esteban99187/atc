<?php
		
	include_once("clsConexion.php");
	class clsDetalle_solicitud extends clsConexion{


		//buscamos los detalles de una solicitud
		public function buscar_detalles($num_solicitud){
			return parent::ejecutar("SELECT tdetalle_solicitud.*, trepuesto.nombre_repuesto FROM tdetalle_solicitud, trepuesto WHERE tdetalle_solicitud.nro_solicitud='$num_solicitud' AND tdetalle_solicitud.id_repuesto = trepuesto.id_repuesto");
		}

		public function row(){
			return mysql_fetch_array($this->res);
		}

	}



?>