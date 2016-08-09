<?php
	require_once("class_db.php");
	class class_nueva_clave extends class_db
	{
		private $aiidusuario;
		private $asclave;
		public function __construct()
		{
			$this->aiidusuario=0;
			$this->asclave="";
		}
		public function __destruct()
		{
		}
		public function fsetiidusuario($piidusuario)
		{
				$this->aiidusuario=$piidusuario;
		}
		public function fsetsclave($psclave)
		{
				$this->asclave=$psclave;
		}
		public function fgetiidusuario()
		{
				return $this->aiidusuario;
		}
		public function fgetsclave()
		{
				return $this->asclave;
		}
		public function fincluir()
		{
			$lbhecho=false;
			$this->fconectar();
			$frase = '$carballo$/';
			$lsclave=sha1($this->asclave);
			$lsclave=md5($lsclave.$frase);
			$lssql="update usuarios set clave='$lsclave' where (idusuario='$this->aiidusuario')";
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}


		
	}
?>
