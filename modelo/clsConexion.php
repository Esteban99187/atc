<?php
	define("DS",DIRECTORY_SEPARATOR); 
	define("PATH",dirname(dirname(__FILE__)));

	require(PATH. DS ."config.php");

	class clsConexion{
		public $con,$res;
		public function __construct(){
			global $configServer;
			$this->con=mysql_connect($configServer["mysql"]["server"],$configServer["mysql"]["user"],$configServer["mysql"]["pass"]) or die (mysql_error());
			mysql_select_db($configServer["BD"],$this->con) or die (mysql_error());
			mysql_query('SET NAMES utf8');
		}

		public function ejecutar($sql){
			$this->res = mysql_query($sql);
			return mysql_affected_rows($this->con);
		} 
	}
?>