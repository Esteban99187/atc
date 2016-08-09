<?php
	define("DS",DIRECTORY_SEPARATOR); 
	define("PATH",dirname(dirname(__FILE__)));

	require(PATH. DS ."config.php");

	class clsConexion{
		public $con,$res;
		
		public function __construct(){
			global $configServer;

			$this->con=mysql_connect($configServer["mysql"]["server"],$configServer["mysql"]["user"],$configServer["mysql"]["pass"]) or die (mysql_error());
			mysql_select_db($configServer["BD"],$this->con)or die (mysql_error());
			mysql_query('SET NAMES utf8');
		}

		public function ejecutar($sql){
			$this->res = mysql_query($sql) or die (mysql_error());
			return mysql_affected_rows($this->con);
		}
		public function arreglo(){
			return mysql_fetch_array($this->res);
		}
		public function set_fecha($fecha){ return implode("-",array_reverse(explode("-",$fecha))); }
		public function BEGIN(){ $this->ejecutar("BEGIN"); }
		public function COMMIT(){ $this->ejecutar("COMMIT"); }
		public function ROLLBACK(){ $this->ejecutar("ROLLBACK"); }
	}
?>