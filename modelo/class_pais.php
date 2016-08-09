<?php
	require_once("class_db.php");
	class class_pais extends class_db
	{
		private $aiidpais;
		private $asdesc_pais;
		public function __construct()
		{
			$this->aiidpais=0;
			$this->asdesc_pais="";
		}
		public function __destruct()
		{
				
		}
		public function fsetiidpais($piidpais)
		{
				$this->aiidpais=$piidpais;
		}
		public function fsetsdesc_pais($psdesc_pais)
		{
				$this->asdesc_pais=$psdesc_pais;
			
		}
		public function fgetiidpais()
		{
				return $this->aiidpais;
		}
		public function fgetsdesc_pais()
		{
				return $this->asdesc_pais;
		}
		public function fbuscar()
		{
			$lbenc=false;
			$lssql="select * from pais where (idpais='$this->aiidpais')";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			if($larow=$this->fproximo($lrtb))
			{
				
				$this->aiidpais=$larow["idpais"];
				$this->asdesc_pais=$larow["desc_pais"];
				$lbenc=true;
				
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lbenc;
		}
		public function fverificarexistencia()
		{
			$lbenc=false;
			$lssql="select * from pais where (desc_pais='$this->asdesc_pais')";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			if($larow=$this->fproximo($lrtb))
			{
				$lbenc=true;
				
			}
			else 
			{
				$lbenc=false;
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lbenc;
		}
		public function fincluir()
		{
			$lbhecho=false;
			$this->fconectar();
			$lssql="insert into pais (desc_pais)values('$this->asdesc_pais')";
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		public function fmodificar()
		{
			$lbhecho=false;
			$this->fconectar();
			$lssql="update pais set desc_pais='$this->asdesc_pais' where (idpais='$this->aiidpais')";
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		public function feliminar()
		{
			$lbhecho=false;
			$lssql="update pais set estatus_pai='0' where (idpais='$this->aiidpais')";
			$this->fconectar();
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		public function factivar()
		{
			$lbhecho=false;
			$lssql="update pais set estatus_pai='1' where (idpais='$this->aiidpais')";
			$this->fconectar();
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		public function flistar()
		{
			$lamatriz=array();
			$lii=0;
			$lssql="select * from pais order by idpais";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			while($larow=$this->fproximo($lrtb))
			{
				$lamatriz[$lii][0]=$larow["idpais"];
				$lamatriz[$lii][1]=$larow["desc_pais"];
				$lamatriz[$lii][2]=$larow["estatus_pai"];
				$lii++;
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lamatriz;
		}
		public function fnuevo()
		{
			$lssql="select max(idpais) as mayor from pais";
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
		public function flistadopais($parametro1,$parametro2)
		{
			$this->fconectar();
			if($parametro1!="")//por codigo
			$sql      = "SELECT * FROM pais  WHERE (idpais='$parametro1' )";
			if($parametro2!="")//por nombre
			$sql      =  "SELECT * FROM pais  WHERE (desc_pais='$parametro2' )";
			$cursor=$this->ffiltro($sql);
			$contador = 0;
			$encontrado=false;
			if ($laRow=$this->fproximo($cursor))
			{
				DO
				{
					$filas [$contador][1] = $laRow["idpais"];
					$filas [$contador][2] = $laRow["desc_pais"];	
					$contador++;
				}
				WHILE ($laRow=$this->fproximo($cursor));
				$encontrado=true;
			}
			if($encontrado)
			return $filas;
			else
			return 99;
			$this->fcierrafiltro($cursor);
			$this->fdesconectar();
		}
		public function flistaractvos()
			{
				$lamatriz=array();
				$lii=0;
				$lssql="select * from pais where estatus_pai='1' order by idpais";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
					$lamatriz[$lii][0]=$larow["idpais"];
					$lamatriz[$lii][1]=$larow["desc_pais"];
					$lii++;
				}
				$this->fcierrafiltro($lrtb);
				$this->fdesconectar();
				return $lamatriz;
			}
		public function flistainactivos()
			{
				$lamatriz=array();
				$lii=0;
				$lssql="select * from pais where estatus_pai='0' order by idpais";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
					$lamatriz[$lii][0]=$larow["idpais"];
					$lamatriz[$lii][1]=$larow["desc_pais"];
					$lii++;
				}
				$this->fcierrafiltro($lrtb);
				$this->fdesconectar();
				return $lamatriz;
			}
    }
?>
