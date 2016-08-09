<?php

	require_once("class_db.php");
	class class_servicio extends class_db
	{
		private $aiidservicio;
		private $asdescripcion_ser;
		private $asidtipo_servicio_ser;
		
		public function __construct()
		{
			$this->aiidservicio=0;
			$this->asdescripcion_ser="";
			$this->asidtipo_servicio_ser="";
		}
		public function __destruct()
		{
		}
		public function fsetiidservicio($piidservicio)
		{
				$this->aiidservicio=$piidservicio;
		}
		public function fsetsdescripcion_ser($psdescripcion_ser)
		{
				$this->asdescripcion_ser=$psdescripcion_ser;
		}
		public function fsetsidtipo_servicio_ser($psidtipo_servicio_ser)
		{
            $this->asidtipo_servicio_ser=$psidtipo_servicio_ser;
		}
		public function fgetiidservicio()
		{
				return $this->aiidservicio;
		}
		public function fgetsdescripcion_ser()
		{
				return $this->asdescripcion_ser;
		}
		public function fgetsidtipo_servicio_ser()
		{
            return $this->asidtipo_servicio_ser;
		}
		public function fbuscar()
		{
			$lbenc=false;
			$lssql="select * from servicio where (idservicio='$this->aiidservicio' and eliminado='0')";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			if($larow=$this->fproximo($lrtb))
			{
				$this->aiidservicio=$larow["idservicio"];
				$this->asdescripcion_ser=$larow["descripcion_ser"];
				$this->asidtipo_servicio_ser=$larow["idtipo_servicio_ser"];
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
			$lssql="insert into servicio (idservicio,descripcion_ser,idtipo_servicio_ser) values('$this->aiidservicio','$this->asdescripcion_ser','$this->asidtipo_servicio_ser')";
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		public function fmodificar()
		{
			$lbhecho=false;
			$this->fconectar();
			$lssql="update servicio set descripcion_ser='$this->asdescripcion_ser', idtipo_servicio_ser='$this->asidtipo_servicio_ser' where (idservicio='$this->aiidservicio')";
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		public function feliminar()
		{
			$lbhecho=false;
			$lssql="update  servicio set eliminado='1' where (idservicio='$this->aiidservicio')";
			$this->fconectar();
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		public function fnuevo()
		{
			$lssql="select max(idservicio) as mayor from servicio";
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
			$lssql="select s.idservicio, s.descripcion_ser, t.idtipo_servicio, t.descripcion_tipser
												from servicio as s
												inner join tipo_servicio as t
												where (s.idtipo_servicio_ser=t.idtipo_servicio)";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			while($larow=$this->fproximo($lrtb))
			{
				$lamatriz[$lii][0]=$larow["idservicio"];
				$lamatriz[$lii][1]=$larow["descripcion_ser"];
				$lamatriz[$lii][2]=$larow["idtipo_servicio"];
				$lamatriz[$lii][3]=$larow["descripcion_tipser"];
				$lii++;
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lamatriz;
		}
		public function flistadoservicio($parametro1,$parametro2)
		{
			$this->fconectar();
			if($parametro1!="")
			{
				$sql="SELECT * FROM servicio  WHERE (idservicio='$parametro1' )";
			}
			if($parametro2!="")
			{
				$sql="SELECT * FROM servicio  WHERE (descripcion_ser='$parametro2' )";
			}
			$cursor=$this->ffiltro($sql);
			$contador = 0;
			$encontrado=false;
			if ($laRow=$this->fproximo($cursor))
			{
				DO
				{
					$filas [$contador][1] = $laRow["idservicio"];
					$filas [$contador][2] = $laRow["descripcion_ser"];
					$filas [$contador][3] = $laRow["idtipo_servicio_ser"];
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
