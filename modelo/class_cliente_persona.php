<?php

	require_once("class_db.php");
	class class_cliente_persona extends class_db
	{
		private $ascliente_persona_cedula;
		private $aspersona_cedula;
		
		public function __construct()
		{
			$this->ascliente_persona_cedula="";
			$this->aspersona_cedula="";
		}
		public function __destruct()
		{
		}
		
		public function fsetscliente_persona_cedula($pscliente_persona_cedula)
		{
            $this->ascliente_persona_cedula=$pscliente_persona_cedula;
		}
		public function fsetspersona_cedula($pspersona_cedula)
		{
            $this->aspersona_cedula=$pspersona_cedula;
		}
		public function fgetscliente_persona_cedula()
		{
            return $this->ascliente_persona_cedula;
		}
		public function fgetspersona_cedula()
		{
            return $this->aspersona_cedula;
		}
		public function fbuscar()
		{
			$lbenc=false;
			$lssql="select * from cliente_persona where (cliente_idcliente='$this->ascliente_idcliente and eliminado='0')";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			if($larow=$this->fproximo($lrtb))
			{
				$this->aspersona_cedula=$larow["persona_cedula"];
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
			$lssql="insert into cliente_persona (cliente_persona_cedula, persona_cedula) values('$this->ascliente_persona_cedula','$this->aspersona_cedula')";
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		public function fmodificar()
		{
			$lbhecho=false;
			$this->fconectar();
			$lssql="update cliente_persona set cliente_persona_cedula='$this->ascliente_persona_cedula', persona_cedula='$this->aspersona_cedula'";
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		public function feliminar()
		{
			$lbhecho=false;
			$lssql="update  cliente_persona set eliminado='1'";
			$this->fconectar();
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		public function fnuevo()
		{
			$lbhecho=false;
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
			$lssql="select * from cliente_persona";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			while($larow=$this->fproximo($lrtb))
			{
		
				$lamatriz[$lii][1]=$larow["cliente_persona_cedula"];
				$lamatriz[$lii][2]=$larow["persona_cedula"];
				$lii++;
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lamatriz;
		}
		public function flistadocliente_persona($parametro1,$parametro2)
		{
			$this->fconectar();
			if($parametro1!="")
			{
				$sql="SELECT * FROM cliente_persona  WHERE (idcuenta='$parametro1' )";
			}
			if($parametro2!="")
			{
				$sql="SELECT * FROM cliente_persona  WHERE (banco_idbanco='$parametro2' )";
			}
			$cursor=$this->ffiltro($sql);
			$contador = 0;
			$encontrado=false;
			if ($laRow=$this->fproximo($cursor))
			{
				DO
				{
					
					$filas [$contador][1] = $laRow["cliente_persona_cedula"];
					$filas [$contador][2] = $laRow["persona_cedula"];
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
