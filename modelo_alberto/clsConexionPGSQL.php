<?php
	define("DS",DIRECTORY_SEPARATOR); 
	define("PATH",dirname(dirname(__FILE__)));

	require(PATH. DS ."config.php");
	class clsConexionPGSQL{
		private $con,$consulta;	
		function __construct(){
			global $configServer;

			//$this->con = pg_connect("host=localhost port=5432 dbname=atcsistem user=postgres password=root");
			$this->con = pg_connect ("host=".$configServer["postgre"]["server"]." port=".$configServer["postgre"]["port"]." dbname=".$configServer["BD"]." user=".$configServer["postgre"]["user"]." password=".$configServer["postgre"]["pass"]) or die('No pudo conectarse: ' . pg_last_error(pg_connect("host=".$configServer["postgre"]["server"]." port=".$configServer["postgre"]["port"]." user=".$configServer["postgre"]["user"]." password=".$configServer["postgre"]["pass"]." dbname=".$configServer["BD"]."")));
		}
		public function ejecutarPG($sql) {
			$this->consulta = pg_query($this->con,$sql);
			//$this->consulta = pg_query($this->con,$sql) or die (pg_last_error());
			return pg_affected_rows($this->consulta);
		}
		public function arregloPG(){ return pg_fetch_array($this->consulta); }
		public function arreglo2(){ return pg_fetch_assoc($this->consulta); }
		public function matriz(){
			$datos = NULL;
			while($data = $this->arreglo()) $datos[] = $data;
			return ($datos!=NULL)?$datos:NULL;
		}
		public function set_fecha($fecha,$sep="-"){ return implode("-", array_reverse(explode($sep,$fecha))); }
		public function BEGIN(){pg_query("BEGIN");}
		public function COMMIT(){pg_query("COMMIT");}
		public function ROLLBACK(){pg_query("ROLLBACK");}
		public function buscarUltimo($tabla,$idtabla) {
			$this->ejecutarPG("SELECT max(".$idtabla.") as id FROM ".$tabla." ");
			$data = $this->arreglo2();
			return intval($data["id"]);
		}
	}
?>