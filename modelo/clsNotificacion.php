<?php 
	require_once("clsConexionPg.php");
	class notificacion extends clsConexionPg{
		public function buscarNotificaciones(){
			$this->ejecutar("SELECT * FROM tnotificacion");
		}
	}
	
?>