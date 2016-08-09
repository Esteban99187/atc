<?php 
	require_once("clsConexionPg.php");
	class notificacion extends clsConexionPg{
		public function buscarNotificaciones(){
			$this->ejecutar("SELECT * FROM tnotificacion where idusuarioreceptor = '".$_SESSION["idUsuario"]."' AND estatus = '0'");
			return $this->matriz();
		}
		public function verTodas(){
			$this->ejecutar("SELECT * FROM tnotificacion where idusuarioreceptor = '".$_SESSION["idUsuario"]."'");
			return $this->matriz();
		}
	}
	
?>