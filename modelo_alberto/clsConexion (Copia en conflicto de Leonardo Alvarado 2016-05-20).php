<?php
	class clsConexion{
		public $server = 'localhost',  $miuser='root', $clav='', $bd='atcsistem', $con,$res;
		
		public function __construct(){
			$this->con = mysql_connect($this->server,$this->miuser,$this->clav) or die(mysql_error());
			mysql_select_db($this->bd,$this->con);
			mysql_query('SET NAMES utf8');
		}

		public function ejecutar($sql){
			$this->res = mysql_query($sql);
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