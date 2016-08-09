<?php

	require_once("../modelo/class_db.php");
	class configuracion extends class_db{

		public function actualizarTopes($campo,$valor){
			$this->fconectar();
			$sql = " update tconfiguracion set $campo = '$valor'";
			if($this->fejecutar($sql)){
				return true;
			}else{
				return false;
			}
		}

		public function topeActual($campo){
			$this->fconectar();
			$sql = "select $campo from tconfiguracion";
			$query = $this->ffiltro($sql);
			while($top = $this->fproximo($query)){
				$valor = $top["$campo"];
			}

			return $valor;
		}



		public function datosConfiguracionTodo(){
			$this->fconectar();
			$sql = "select * from tconfiguracion where idConfiguracion = '1'";
			$consulta = $this->ffiltro($sql);
			while($rs = $this->fproximo($consulta))
			{
				@$datos = array($rs["numeroIntentos"],$rs["caducidadClave"],$rs["preguntasSecretas"],$rs["tiempoConexion"],
				$rs["nombresistema"],$rs["version"],$rs["lenguageprogramacion"],$rs["mensajesTexto"]);
			}
			return @$datos;
		}
		public function datos_mision(){
			$this->fconectar();
			$sql = "select * from tconfiguracion where idConfiguracion = '1'";
			$consulta = $this->ffiltro($sql);
			while($rs = $this->fproximo($consulta))
			{
				@$datos = array($rs["mision"]);
			}
			return @$datos;
		}
		public function datos_vision(){
			$this->fconectar();
			$sql = "select * from tconfiguracion where idConfiguracion = '1'";
			$consulta = $this->ffiltro($sql);
			while($rs = $this->fproximo($consulta))
			{
				@$datos = array($rs["vision"]);
			}
			return @$datos;
		}
		public function datos_historia(){
			$this->fconectar();
			$sql = "select * from tconfiguracion where idConfiguracion = '1'";
			$consulta = $this->ffiltro($sql);
			while($rs = $this->fproximo($consulta))
			{
				@$datos = array($rs["historia"]);
			}
			return @$datos;
		}
		public function datos_quienes_somos(){
			$this->fconectar();
			$sql = "select * from tconfiguracion where idConfiguracion = '1'";
			$consulta = $this->ffiltro($sql);
			while($rs = $this->fproximo($consulta))
			{
				@$datos = array($rs["quienes_somos"]);
			}
			return @$datos;
		}
		public function datos_objetivos(){
			$this->fconectar();
			$sql = "select * from tconfiguracion where idConfiguracion = '1'";
			$consulta = $this->ffiltro($sql);
			while($rs = $this->fproximo($consulta))
			{
				@$datos = array($rs["objetivos"]);
			}
			return @$datos;
		}

		public function actulizarConfiguracion($datos)
		{
			$this->fconectar();
			$sql ="update tconfiguracion set numeroIntentos = '$datos[0]', caducidadClave = '$datos[1]', preguntasSecretas = '$datos[2]', 
					tiempoConexion = '$datos[3]', nombresistema = '$datos[4]' , version = '$datos[5]', 
					lenguageprogramacion = '$datos[6]', mensajesTexto = '$datos[7]' WHERE idConfiguracion = '1'";
			if($this->fejecutar($sql))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function actulizar_mision($datos)
		{
			$this->fconectar();
			$sql ="update tconfiguracion set mision = '$datos[0]'";
			if($this->fejecutar($sql))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function actulizar_vision($datos)
		{
			$this->fconectar();
			$sql ="update tconfiguracion set vision = '$datos[0]'";
			if($this->fejecutar($sql))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function actulizar_historia($datos)
		{
			$this->fconectar();
			$sql ="update tconfiguracion set historia = '$datos[0]'";
			if($this->fejecutar($sql))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function actulizar_quienes_somos($datos)
		{
			$this->fconectar();
			$sql ="update tconfiguracion set quienes_somos = '$datos[0]'";
			if($this->fejecutar($sql))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function actulizar_objetivos($datos)
		{
			$this->fconectar();
			$sql ="update tconfiguracion set objetivos = '$datos[0]'";
			if($this->fejecutar($sql))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}
?>
