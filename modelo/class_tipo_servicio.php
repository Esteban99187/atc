<?php
	require_once("class_db.php");
	class class_tipo_servicio extends class_db
	{
		private $aiidtipo_servicio;
		private $asdescripcion_tipser;
		public function __construct()
		{
			$this->aiidtipo_servicio=0;
			$this->asdescripcion_tipser="";
		}
		public function __destruct()
		{
		}
		public function fsetiidtipo_servicio($piidtipo_servicio)
		{
				$this->aiidtipo_servicio=$piidtipo_servicio;
		}
		public function fsetsdescripcion_tipser($psdescripcion_tipser)
		{
				$this->asdescripcion_tipser=$psdescripcion_tipser;
		}
		public function fgetiidtipo_servicio()
		{
				return $this->aiidtipo_servicio;
		}
		public function fgetsdescripcion_tipser()
		{
				return $this->asdescripcion_tipser;
		}
		public function fbuscar()
		{
			$lbenc=false;
			$lssql="select * from tipo_servicio where (idtipo_servicio='$this->aiidtipo_servicio' and eliminado='0')";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			if($larow=$this->fproximo($lrtb))
			{
				$this->aiidtipo_servicio=$larow["idtipo_servicio"];
				$this->asdescripcion_tipser=$larow["descripcion_tipser"];
				$lbenc=true;
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lbenc;
		}
		public function fincluir()
		{
			$lbhecho=false;
			$this->fconectar();
			$lssql="insert into tipo_servicio (idtipo_servicio,descripcion_tipser)values('$this->aiidtipo_servicio','$this->asdescripcion_tipser')";
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		public function fmodificar()
		{
			$lbhecho=false;
			$this->fconectar();
			$lssql="update tipo_servicio set descripcion_tipser='$this->asdescripcion_tipser' where (idtipo_servicio='$this->aiidtipo_servicio')";
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		public function feliminar()
		{
			$lbhecho=false;
			$lssql="update  tipo_servicio set eliminado='1' where (idtipo_servicio='$this->aiidtipo_servicio')";
			$this->fconectar();
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		public function fnuevo()
		{
			$lssql="select max(idtipo_servicio) as mayor from tipo_servicio";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			if($larow=$this->fproximo($lrtb))
			{
				$liaux=$larow["mayor"]+1;
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $liaux;
		}
		public function flistar()
		{
			$lamatriz=array();
			$lii=0;
			$lssql="select * from tipo_servicio order by idtipo_servicio";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			while($larow=$this->fproximo($lrtb))
			{
				$lamatriz[$lii][0]=$larow["idtipo_servicio"];
				$lamatriz[$lii][1]=$larow["descripcion_tipser"];
				$lii++;
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lamatriz;
		}
		public function flistadotipo_servicio($parametro1,$parametro2)
		{
			$this->fconectar();
			if($parametro1!="")
			{
				$sql="SELECT * FROM tipo_servicio  WHERE (idtipo_servicio='$parametro1' )";
			}
			if($parametro2!="")
			{
				$sql="SELECT * FROM tipo_servicio  WHERE (descripcion_tipser='$parametro2' )";
			}
			$cursor=$this->ffiltro($sql);
			$contador = 0;
			$encontrado=false;
			if ($laRow=$this->fproximo($cursor))
			{
				DO
				{
					$filas [$contador][1] = $laRow["idtipo_servicio"];
					$filas [$contador][2] = $laRow["descripcion_tipser"];
					$contador++;
				}
				WHILE ($laRow=$this->fproximo($cursor));
				$encontrado=true;
			}
			if($encontrado)
			{
				return $filas;
			}
			else
			{
				return 99;
			}  
			$this->fcierrafiltro($cursor);
			$this->fdesconectar();
		}
	}
?>
