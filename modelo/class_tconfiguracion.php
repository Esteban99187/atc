<?php
	require_once("class_db.php");
	class class_tconfiguracion extends class_db
	{
		private $aiidConfiguracion;
		private $ainumeroIntentos;
		private $aicaducidadClave;
		private $aipreguntasSecretas;
		private $aitiempoConexion;
		private $asmision;
		private $asvision;
		private $aitopeMaximoInspeccion;
		private $aitopeMaximoCapacitacion;
		private $asnombresistema;
		private $asversion;
		private $aslenguageprogramacion;
		private $aimensajesTexto;
		public function __construct()
		{
			$this->aiidConfiguracion=0;
			$this->ainumeroIntentos="";
			$this->aicaducidadClave="";
			$this->aipreguntasSecretas="";
			$this->aitiempoConexion="";
			$this->asmision="";
			$this->asvision="";
			$this->aitopeMaximoInspeccion="";
			$this->aitopeMaximoCapacitacion="";
			$this->asnombresistema="";
			$this->asversion="";
			$this->aslenguageprogramacion="";
			$this->aimensajesTexto="";
		}
		public function __destruct()
		{
		}
		public function fsetiidConfiguracion($piidConfiguracion)
		{
				$this->aiidConfiguracion=$piidConfiguracion;
		}
		public function fsetinumeroIntentos($pinumeroIntentos)
		{
				$this->ainumeroIntentos=$pinumeroIntentos;
		}
		public function fseticaducidadClave($picaducidadClave)
		{
				$this->aicaducidadClave=$picaducidadClave;
		}
		public function fsetipreguntasSecretas($pipreguntasSecretas)
		{
				$this->aipreguntasSecretas=$pipreguntasSecretas;
		}
		public function fsetitiempoConexion($pitiempoConexion)
		{
				$this->aitiempoConexion=$pitiempoConexion;
		}
		public function fsetsmision($psmision)
		{
				$this->asmision=$psmision;
		}
		public function fsetsvision($psvision)
		{
				$this->asvision=$psvision;
		}
		public function fsetitopeMaximoInspeccion($pitopeMaximoInspeccion)
		{
				$this->aitopeMaximoInspeccion=$pitopeMaximoInspeccion;
		}
		public function fsetitopeMaximoCapacitacion($pitopeMaximoCapacitacion)
		{
				$this->aitopeMaximoCapacitacion=$pitopeMaximoCapacitacion;
		}
		public function fsetsnombresistema($psnombresistema)
		{
				$this->asnombresistema=$psnombresistema;
		}
		public function fsetsversion($psversion)
		{
				$this->asversion=$psversion;
		}
		public function fsetslenguageprogramacion($pslenguageprogramacion)
		{
				$this->aslenguageprogramacion=$pslenguageprogramacion;
		}
		public function fsetimensajesTexto($pimensajesTexto)
		{
				$this->aimensajesTexto=$pimensajesTexto;
		}
		public function fgetiidConfiguracion()
		{
				return $this->aiidConfiguracion;
		}
		public function fgetinumeroIntentos()
		{
				return $this->ainumeroIntentos;
		}
		public function fgeticaducidadClave()
		{
				return $this->aicaducidadClave;
		}
		public function fgetipreguntasSecretas()
		{
				return $this->aipreguntasSecretas;
		}
		public function fgetitiempoConexion()
		{
				return $this->aitiempoConexion;
		}
		public function fgetsmision()
		{
				return $this->asmision;
		}
		public function fgetsvision()
		{
				return $this->asvision;
		}
		public function fgetitopeMaximoInspeccion()
		{
				return $this->aitopeMaximoInspeccion;
		}
		public function fgetitopeMaximoCapacitacion()
		{
				return $this->aitopeMaximoCapacitacion;
		}
		public function fgetsnombresistema()
		{
				return $this->asnombresistema;
		}
		public function fgetsversion()
		{
				return $this->asversion;
		}
		public function fgetslenguageprogramacion()
		{
				return $this->aslenguageprogramacion;
		}
		public function fgetimensajesTexto()
		{
				return $this->aimensajesTexto;
		}
		public function fbuscar()
		{
			$lbenc=false;
			$lssql="select * from tconfiguracion where (idConfiguracion='$this->aiidConfiguracion' and eliminado='0')";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			if($larow=$this->fproximo($lrtb))
			{
				$this->aiidConfiguracion=$larow["idConfiguracion"];
				$this->ainumeroIntentos=$larow["numeroIntentos"];
				$this->aicaducidadClave=$larow["caducidadClave"];
				$this->aipreguntasSecretas=$larow["preguntasSecretas"];
				$this->aitiempoConexion=$larow["tiempoConexion"];
				$this->asmision=$larow["mision"];
				$this->asvision=$larow["vision"];
				$this->aitopeMaximoInspeccion=$larow["topeMaximoInspeccion"];
				$this->aitopeMaximoCapacitacion=$larow["topeMaximoCapacitacion"];
				$this->asnombresistema=$larow["nombresistema"];
				$this->asversion=$larow["version"];
				$this->aslenguageprogramacion=$larow["lenguageprogramacion"];
				$this->aimensajesTexto=$larow["mensajesTexto"];
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
			$lssql="insert into tconfiguracion (idConfiguracion,numeroIntentos,caducidadClave,preguntasSecretas,tiempoConexion,mision,vision,topeMaximoInspeccion,topeMaximoCapacitacion,nombresistema,version,lenguageprogramacion,mensajesTexto)values('$this->aiidConfiguracion','$this->ainumeroIntentos','$this->aicaducidadClave','$this->aipreguntasSecretas','$this->aitiempoConexion','$this->asmision','$this->asvision','$this->aitopeMaximoInspeccion','$this->aitopeMaximoCapacitacion','$this->asnombresistema','$this->asversion','$this->aslenguageprogramacion','$this->aimensajesTexto')";
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		public function fmodificar()
		{
			$lbhecho=false;
			$this->fconectar();
			$lssql="update tconfiguracion set numeroIntentos='$this->ainumeroIntentos', caducidadClave='$this->aicaducidadClave', preguntasSecretas='$this->aipreguntasSecretas', tiempoConexion='$this->aitiempoConexion', mision='$this->asmision', vision='$this->asvision', topeMaximoInspeccion='$this->aitopeMaximoInspeccion', topeMaximoCapacitacion='$this->aitopeMaximoCapacitacion', nombresistema='$this->asnombresistema', version='$this->asversion', lenguageprogramacion='$this->aslenguageprogramacion', mensajesTexto='$this->aimensajesTexto' where (idConfiguracion='$this->aiidConfiguracion')";
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		public function feliminar()
		{
			$lbhecho=false;
			$lssql="update  tconfiguracion set eliminado='1' where (idConfiguracion='$this->aiidConfiguracion')";
			$this->fconectar();
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		public function fnuevo()
		{
			$lssql="select max(idConfiguracion) as mayor from tconfiguracion";
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
			$lssql="select * from tconfiguracion order by idConfiguracion";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			while($larow=$this->fproximo($lrtb))
			{
				$lamatriz[$lii][0]=$larow["idConfiguracion"];
				$lamatriz[$lii][1]=$larow["numeroIntentos"];
				$lamatriz[$lii][2]=$larow["caducidadClave"];
				$lamatriz[$lii][3]=$larow["preguntasSecretas"];
				$lamatriz[$lii][4]=$larow["tiempoConexion"];
				$lamatriz[$lii][5]=$larow["mision"];
				$lamatriz[$lii][6]=$larow["vision"];
				$lamatriz[$lii][7]=$larow["topeMaximoInspeccion"];
				$lamatriz[$lii][8]=$larow["topeMaximoCapacitacion"];
				$lamatriz[$lii][9]=$larow["nombresistema"];
				$lamatriz[$lii][10]=$larow["version"];
				$lamatriz[$lii][11]=$larow["lenguageprogramacion"];
				$lamatriz[$lii][12]=$larow["mensajesTexto"];
				$lii++;
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lamatriz;
		}
		public function flistadotconfiguracion($parametro1,$parametro2)
		{
			$this->fconectar();
			if($parametro1!="")
			{
				$sql="SELECT * FROM tconfiguracion  WHERE (idConfiguracion='$parametro1' )";
			}
			if($parametro2!="")
			{
				$sql="SELECT * FROM tconfiguracion  WHERE (numeroIntentos='$parametro2' )";
			}
			$cursor=$this->ffiltro($sql);
			$contador = 0;
			$encontrado=false;
			if ($laRow=$this->fproximo($cursor))
			{
				DO
				{
					$filas [$contador][1] = $laRow["idConfiguracion"];
					$filas [$contador][2] = $laRow["numeroIntentos"];
					$filas [$contador][3] = $laRow["caducidadClave"];
					$filas [$contador][4] = $laRow["preguntasSecretas"];
					$filas [$contador][5] = $laRow["tiempoConexion"];
					$filas [$contador][6] = $laRow["mision"];
					$filas [$contador][7] = $laRow["vision"];
					$filas [$contador][8] = $laRow["topeMaximoInspeccion"];
					$filas [$contador][9] = $laRow["topeMaximoCapacitacion"];
					$filas [$contador][10] = $laRow["nombresistema"];
					$filas [$contador][11] = $laRow["version"];
					$filas [$contador][12] = $laRow["lenguageprogramacion"];
					$filas [$contador][13] = $laRow["mensajesTexto"];
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
