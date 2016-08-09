<?php

	require_once("class_db.php");

	class clsusuario
	{
		private $passw;
		private $acnombre1;
		private $acnombre2;
		private $acapellido1;
		private $acapellido2;
		private $acemail;
		private $actlf;
		private $acusuario;
		private $accontrasena;
		private $acpregunta;
		private $acrespuesta;
		private $annivel;
		private $acpwnueva1;

		public function __construct($passw, $pcnombre1, $pcnombre2, $pcapellido1, $pcapellido2, $pcemail, $pctlf, $pcusuario, $pccontrasena, $pcpregunta, $pcrespuesta, $pnnivel)
		{ 
			$this->passw=$passw;
			$this->acnombre1=$pcnombre1;
			$this->acnombre2=$pcnombre2;
			$this->acapellido1=$pcapellido1;
			$this->acapellido2=$pcapellido2;
			$this->acemail=$pcemail;
			$this->actlf=$pctlf;
			$this->acusuario=$pcusuario;
			$this->accontrasena=$pccontrasena;
			$this->acpregunta=$pcpregunta;
			$this->acrespuesta=$pcrespuesta;
			$this->annivel=$pnnivel;
		}

		public function __destruct()
		{
		}
		public function getpassw()
		{
			return $this->passw;
		}
		public function getnombre1()
		{
			return $this->acnombre1;
		}
		public function getnombre2()
		{
			return $this->acnombre2;
		}
		public function getapellido1()
		{
			return $this->acapellido1;
		}
		public function getapellido2()
		{
			return $this->acapellido2;
		}
		public function getemail()
		{
			return $this->acemail;
		}
		public function gettlf()
		{
			return $this->actlf;
		}
		public function getusuario()
		{
			return $this->acusuario;
		}
		public function getcontrasena()
		{
			return $this->accontrasena;
		}
		public function getpregunta()
		{
			return $this->acpregunta;
		}
		public function getrespuesta()
		{
			return $this->acrespuesta;
		}
		public function getnivel()
		{
			return $this->annivel;
		}
		public function setpwnueva1($pcpwnueva1)
		{
			$this->acpwnueva1=$pcpwnueva1;
		}

		public function busca_usuario()
		{
			$llEnc=false;//local logico encontrado
			$lcSql="select * from usuario where (cod_usuario='$this->acusuario')";
			$lobjdatos=new clsdatos();
			$lrTb=$lobjdatos->filtro($lcSql);
			if($laRow=$lobjdatos->proximo($lrTb))
			{
				$this->acnombre1=$laRow["nombre1"];
				$this->acnombre2=$laRow["nombre2"];
				$this->acapellido1=$laRow["apellido1"];
				$this->acapellido2=$laRow["apellido2"];
				$this->acemail=$laRow["email"];
				$this->actlf=$laRow["tlf"];
				$this->acusuario=$laRow["usuario"];
				$this->accontrasena=$laRow["contrasena"];
				$this->acpregunta=$laRow["pregunta"];
				$this->acrespuesta=$laRow["respuesta"];
				$this->annivel=$laRow["nivel"];
				$llEnc=true;
			}
			$lobjdatos->cierrafiltro($lrTb);
			$lobjdatos->desconectar();
			return $llEnc;
		}

		public function busca_respuesta()
		{
			$llEnc=false;
			$frase = '$carballo$/';
			$lsrespuesta=sha1($this->acrespuesta);
			$lsrespuesta=md5($lsrespuesta.$frase);
			$lcSql="select * from usuario where (cod_usuario='$this->acusuario') and (respuesta='$lsrespuesta') ";
			$lobjdatos=new clsdatos();
			$lrTb=$lobjdatos->filtro($lcSql);
			if($laRow=$lobjdatos->proximo($lrTb))
			{
				$llEnc=true;
			}
			$lobjdatos->cierrafiltro($lrTb);
			$lobjdatos->desconectar();
			return $llEnc;
		}

		public function modificar_contrasena()
		{
			$llhecho=false;
			$lobjdatos=new clsdatos();
			
			$frase = '$carballo$/';
			
			$lsclave=sha1($this->passw);        
			$lsclave=md5($lsclave.$frase);
			
			$lcSql="update usuario set clave='$lsclave' where cod_usuario='$this->acusuario'";
			$llhecho=$lobjdatos->ejecutar($lcSql);
			$lobjdatos->desconectar();
			return $llhecho;
		}

	}
?>
