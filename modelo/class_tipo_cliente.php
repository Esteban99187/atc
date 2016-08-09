<?php

    require_once("class_db.php");
	class class_tipo_cliente extends class_db
	{
			private $aiidtipo_cliente;
			private $asdesc_tipo_clie;
			
		public function __construct()
		{
			$this->aiidtipo_cliente=0;
			$this->asdesc_tipo_clie="";
		}
			
		public function __destruct()
		{
				
		}
			
		public function fsetiidtipo_cliente($piidtipo_cliente)
		{
				$this->aiidtipo_cliente=$piidtipo_cliente;
		}
			
		public function fsetsdesc_tipo_clie($psdesc_tipo_clie)
		{
				$this->asdesc_tipo_clie=$psdesc_tipo_clie;
			
		}
			
		public function fgetiidtipo_cliente()
		{
				return $this->aiidtipo_cliente;
		}
			
		public function fgetsdesc_tipo_clie()
		{
				return $this->asdesc_tipo_clie;
		}
			
		public function fbuscar()
		{
				$lbenc=false;
				$lssql="select * from tipo_cliente where (idtipo_cliente='$this->aiidtipo_cliente')";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				if($larow=$this->fproximo($lrtb))
				{
					
					$this->aiidtipo_cliente=$larow["idtipo_cliente"];
					$this->asdesc_tipo_clie=$larow["desc_tipo_clie"];
					$lbenc=true;
					
				}
				$this->fcierrafiltro($lrtb);
				$this->fdesconectar();
				return $lbenc;
		}
		public function fverificarexistencia()
		{
			$lbenc=false;
			$lssql="select * from tipo_cliente where (desc_tipo_clie='$this->asdesc_tipo_clie')";
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
				$lssql="insert into tipo_cliente (idtipo_cliente,desc_tipo_clie)values('$this->aiidtipo_cliente','$this->asdesc_tipo_clie')";
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
			}
			
		public function fmodificar()
			{
				$lbhecho=false;
				$this->fconectar();
				$lssql="update tipo_cliente set desc_tipo_clie='$this->asdesc_tipo_clie' where (idtipo_cliente='$this->aiidtipo_cliente')";
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
			}
			
		public function feliminar()
		{
				$lbhecho=false;
				$lssql="update tipo_cliente set estatus_tipcli='0' where (idtipo_cliente='$this->aiidtipo_cliente')";
				$this->fconectar();
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
		}
		public function factivar()
		{
			$lbhecho=false;
			$lssql="update tipo_cliente set estatus_tipcli='1' where (idtipo_cliente='$this->aiidtipo_cliente')";
			$this->fconectar();
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}	
		public function flistar()
			{
				$lamatriz=array();
				$lii=0;
				$lssql="select * from tipo_cliente order by idtipo_cliente";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
					$lamatriz[$lii][0]=$larow["idtipo_cliente"];
					$lamatriz[$lii][1]=$larow["desc_tipo_clie"];
					$lii++;
				}
				$this->fcierrafiltro($lrtb);
				$this->fdesconectar();
				return $lamatriz;
			}
			public function flistaractvos()
			{
				$lamatriz=array();
				$lii=0;
				$lssql="select * from tipo_cliente where estatus_tipcli='1' order by idtipo_cliente";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
					$lamatriz[$lii][0]=$larow["idtipo_cliente"];
					$lamatriz[$lii][1]=$larow["desc_tipo_clie"];
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
				$lssql="select * from tipo_cliente where estatus_tipcli='0' order by idtipo_cliente";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
					$lamatriz[$lii][0]=$larow["idtipo_cliente"];
					$lamatriz[$lii][1]=$larow["desc_tipo_clie"];
					$lii++;
				}
				$this->fcierrafiltro($lrtb);
				$this->fdesconectar();
				return $lamatriz;
			}
		public function fnuevo()
			{
				$lssql="select max(idtipo_cliente) as mayor from tipo_cliente";
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
    public function flistadotipo_cliente($parametro1,$parametro2){
		  $this->fconectar();
		  if($parametro1!="")//por codigo
			$sql      = "SELECT * FROM tipo_cliente  WHERE (idtipo_cliente='$parametro1' )";
			
		  if($parametro2!="")//por nombre
			$sql      =  "SELECT * FROM tipo_cliente WHERE (desc_tipo_clie='$parametro2' )";
		 
		  $cursor=$this->ffiltro($sql);
		  $contador = 0;
		  $encontrado=false;
		  
		 if ($laRow=$this->fproximo($cursor)){
				DO
				{
				   $filas [$contador][1] = $laRow["idtipo_cliente"];
				   $filas [$contador][2] = $laRow["desc_tipo_clie"];	
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
			
    }  
?>
