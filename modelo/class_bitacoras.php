<?php
	require_once("class_db.php");
	class class_bitacoras extends class_db
	{
		private $aiidBitacora;
		private $asidUsuario;
		private $asip;
		private $asActividad;
		private $asfecha;
		private $ashora;
		private $aspanel;
		private $astipoBitacora;
		public function __construct()
		{
			$this->aiidBitacora=0;
			$this->asidUsuario="";
			$this->asip="";
			$this->asActividad="";
			$this->asfecha="";
			$this->ashora="";
			$this->aspanel="";
			$this->astipoBitacora="";
		}
		public function __destruct()
		{
		}
		public function fsetiidBitacora($piidBitacora)
		{
				$this->aiidBitacora=$piidBitacora;
		}
		public function fsetsidUsuario($psidUsuario)
		{
				$this->asidUsuario=$psidUsuario;
		}
		public function fsetsip($psip)
		{
				$this->asip=$psip;
		}
		public function fsetsActividad($psActividad)
		{
				$this->asActividad=$psActividad;
		}
		public function fsetsfecha($psfecha)
		{
				$this->asfecha=$psfecha;
		}
		public function fsetshora($pshora)
		{
				$this->ashora=$pshora;
		}
		public function fsetspanel($pspanel)
		{
				$this->aspanel=$pspanel;
		}
		public function fsetstipoBitacora($pstipoBitacora)
		{
				$this->astipoBitacora=$pstipoBitacora;
		}
		public function fgetiidBitacora()
		{
				return $this->aiidBitacora;
		}
		public function fgetsidUsuario()
		{
				return $this->asidUsuario;
		}
		public function fgetsip()
		{
				return $this->asip;
		}
		public function fgetsActividad()
		{
				return $this->asActividad;
		}
		public function fgetsfecha()
		{
				return $this->asfecha;
		}
		public function fgetshora()
		{
				return $this->ashora;
		}
		public function fgetspanel()
		{
				return $this->aspanel;
		}
		public function fgetstipoBitacora()
		{
				return $this->astipoBitacora;
		}
		public function fbuscar2()
		{
			$lbenc=false;
			$lssql="select * from bitacora where (idBitacora='$this->aiidBitacora')";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			if($larow=$this->fproximo($lrtb))
			{
				$this->aiidBitacora=$larow["idBitacora"];
				$this->asidUsuario=$larow["idUsuario"];
				$this->asip=$larow["ip"];
				$this->asActividad=$larow["Actividad"];
				$this->asfecha=$larow["fecha"];
				$this->ashora=$larow["hora"];
				$this->aspanel=$larow["panel"];
				$this->astipoBitacora=$larow["tipoBitacora"];
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
			$lssql="insert into bitacora (idBitacora,idUsuario, ip, Actividad, fecha, hora, panel, tipoBitacora)values('$this->aiidBitacora','$this->asidUsuario','$this->asip','$this->asActividad','$this->asfecha','$this->ashora','$this->aspanel','$this->astipoBitacora')";
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		public function fmodificar()
		{
			$lbhecho=false;
			$this->fconectar();
			$lssql="update bitacora set idUsuario='$this->asidUsuario', ip='$this->asip', Actividad='$this->asActividad', fecha='$this->asfecha', hora='$this->ashora', panel='$this->aspanel', tipoBitacora='$this->astipoBitacora' where (idBitacora='$this->aiidBitacora')";
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		public function feliminar()
		{
			$lbhecho=false;
			$lssql="update  bitacora set eliminado='1' where (idBitacora='$this->aiidBitacora')";
			$this->fconectar();
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		public function fnuevo()
		{
			$lssql="select max(idBitacora) as mayor from bitacora";
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
			$lssql="select * from bitacora order by idBitacora";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			while($larow=$this->fproximo($lrtb))
			{
				$lamatriz[$lii][0]=$larow["idBitacora"];
				$lamatriz[$lii][1]=$larow["idUsuario"];
				$lamatriz[$lii][2]=$larow["Actividad"];
				$lamatriz[$lii][3]=$larow["fecha"];
				$lamatriz[$lii][4]=$larow["hora"];
				$lamatriz[$lii][5]=$larow["panel"];
				$lamatriz[$lii][6]=$larow["tipoBitacora"];
				$lii++;
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lamatriz;
		}
		public function flistadobitacora($parametro1,$parametro2)
		{
			$this->fconectar();
			if($parametro1!="")
			{
				$sql="SELECT * FROM bitacora  WHERE (idBitacora='$parametro1' )";
			}
			if($parametro2!="")
			{
				$sql="SELECT * FROM bitacora  WHERE (idUsuario='$parametro2' )";
			}
			$cursor=$this->ffiltro($sql);
			$contador = 0;
			$encontrado=false;
			if ($laRow=$this->fproximo($cursor))
			{
				DO
				{
					$filas [$contador][1] = $laRow["idBitacora"];
					$filas [$contador][2] = $laRow["idUsuario"];
					$filas [$contador][3] = $laRow["Actividad"];
					$filas [$contador][4] = $laRow["fecha"];
					$filas [$contador][5] = $laRow["hora"];
					$filas [$contador][6] = $laRow["panel"];
					$filas [$contador][7] = $laRow["tipoBitacora"];
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
