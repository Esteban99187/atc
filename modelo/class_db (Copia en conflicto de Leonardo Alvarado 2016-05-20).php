<?php
	class class_db{
		public 	$servidor="localhost",
		$user="root",
		$pass="",
		$db="atcsistem",
		$fecha_hora,
		$con,
		$res;
		public function __CONSTRUCT(){
			$this->con=mysql_connect($this->servidor,$this->user,$this->pass);
			mysql_select_db($this->db,$this->con);
			$this->fecha_hora=date("Y-m-d h:i:s");
		}
		public function ejecutar($sql){
			$this->res=mysql_query($sql) or die (mysql_error());
			return mysql_affected_rows($this->con);
		}
		private $arCon; //atributo de recurso conexión
		protected function fconectar() { //función para conectar con mysql
			$lsServidor=$this->servidor; //servidor donde se encuentra la base de datos
			$lsUsuario=$this->user; //usuario del servidor de la base de datos
			$lsContrasena=$this->pass; //contrasena del servidor de la base de datos
			$lsBaseDatos=$this->db; //base de datos a trabajar en el software
			$this->arCon=mysql_connect($lsServidor,$lsUsuario,$lsContrasena) OR die('No pudo conectarse: ' . mysql_error());  //conecta con mysql
			mysql_select_db($lsBaseDatos,$this->arCon) OR die('Invalida Selección: ' . mysql_error()); //selecciona la base de datos a trabajar en el software
			mysql_query("SET NAMES utf8"); //retorna caracter latinos
		}
		protected function Bitacora($Operacion,$Panel,$TipoBitacora) { //ejecuta query de busqueda
			session_start();  
			$idusuario=$_SESSION["idUsuario"];
			$ip=$_SESSION["ip"];
			$lsbitacora="insert into Bitacora (IdUsuario,Ip,Actividad,Panel,TipoBitacora) values ('$idusuario','$ip','$Operacion','$Panel','$TipoBitacora')";
			$okbitacora=$this->fejecutar($lsbitacora);
		}


		protected function ffiltro($psSql) //ejecuta query de busqueda
		{
			$lrTb=mysql_query($psSql,$this->arCon) OR die('Invalida Busqueda: ' . mysql_error()); //ejecuta query
			return $lrTb;
		}


		protected function fproximo($prTb) //retorna en un arreglo las filas
		{
			$laRow=mysql_fetch_array($prTb); //convierte el recurso en el arreglo
			return $laRow;
		}
		protected function fnum_registros($prTb) //retorna cantidad de filas devueltas en un query
		{
		
			$liRegistros=mysql_num_rows($prTb); //cantidad de filas devueltas en un query
			return $liRegistros;
		}

		public function row($sql){
			return mysql_num_rows($sql);
		}


		protected function fcierrafiltro($prTb) //cierra un query
		{
			mysql_free_result($prTb); //libera los recursos de un query
		}
		protected function fbegin()
		{
			mysql_query("BEGIN",$this->arCon);
		}
		protected function fcommit()
		{
			mysql_query("COMMIT",$this->arCon);
		}
		protected function frollback()
		{
			mysql_query("ROLLBACK",$this->arCon);
		}
		protected function fejecutar($psSql)
		{
			$lrTb=mysql_query($psSql,$this->arCon) OR die('Invalida Ejecución: ' . mysql_error());
			if (mysql_affected_rows($this->arCon)==0)
			return false;
			return true;
		}
		protected function fdesconectar()
		{
			mysql_close($this->arCon);
		}
		protected function ffechaBD($psFecha)
		{
			$lsNow=date("Y-m-d");
			if (strlen($psFecha)==10)
			{
				$lsDia=substr($psFecha,0,2);
				$lsMes=substr($psFecha,3,2);
				$lsAno=substr($psFecha,6,4);
				$lsNow=$lsAno."-".$lsMes."-".$lsDia;
			 }
			 return $lsNow;
		}
		protected function fetch_row($prTb)
		{
			$ftRow = mysql_fetch_row($prTb);
			return $ftRow; 
		} 
		protected function fieldss($prTb)
		{
			$fieldssql = mysql_num_fields($prTb);
			return $fieldssql;
		}
		public function fechapl($fecha)
		{
			$desc = explode("/",$fecha);
			$fechabn = $desc[2]."-".$desc[0]."-".$desc[1];
			return $fechabn;
		}
	}
?>
