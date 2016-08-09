<?php
	
	include_once("clsConexion.php");
	class clsLogueo extends clsConexion{



		//vamos a conectar primeramente con la funcion logueo
		public function logueo($usu, $pass){
			return parent::ejecutar("SELECT * FROM usuarios WHERE idusuario='$usu' AND clave='$pass' ");
		}

		public function row(){
			return mysql_fetch_array($this->res);
		}


	}

?>