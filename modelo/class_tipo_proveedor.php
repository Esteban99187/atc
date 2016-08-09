<?php

    require_once("class_db.php");
	class class_tipo_proveedor extends class_db
	{
			private $aiidtipo_proveedor;
			private $asdesc_tipo_prov;
			
		public function __construct()
		{
			$this->aiidtipo_proveedor=0;
			$this->asdesc_tipo_prov="";
		}
			
		public function __destruct()
		{
				
		}
			
		public function fsetiidtipo_proveedor($piidtipo_proveedor)
		{
				$this->aiidtipo_proveedor=$piidtipo_proveedor;
		}
			
		public function fsetsdesc_tipo_prov($psdesc_tipo_prov)
		{
				$this->asdesc_tipo_prov=$psdesc_tipo_prov;
			
		}
			
		public function fgetiidtipo_proveedor()
		{
				return $this->aiidtipo_proveedor;
		}
			
		public function fgetsdesc_tipo_prov()
		{
				return $this->asdesc_tipo_prov;
		}
			
		public function fbuscar()
		{
				$lbenc=false;
				$lssql="select * from tipo_proveedor where (idtipo_proveedor='$this->aiidtipo_proveedor')";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				if($larow=$this->fproximo($lrtb))
				{
					
					$this->aiidtipo_proveedor=$larow["idtipo_proveedor"];
					$this->asdesc_tipo_prov=$larow["desc_tipo_prov"];
					$lbenc=true;
					
				}
				$this->fcierrafiltro($lrtb);
				$this->fdesconectar();
				return $lbenc;
		}
		
		public function fverificarexistencia()
		{
			$lbenc=false;
			$lssql="select * from tipo_proveedor where (desc_tipo_prov='$this->asdesc_tipo_prov')";
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
				$lssql="insert into tipo_proveedor (idtipo_proveedor,desc_tipo_prov)values('$this->aiidtipo_proveedor','$this->asdesc_tipo_prov')";
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
			}
			
		public function fmodificar()
			{
				$lbhecho=false;
				$this->fconectar();
				$lssql="update tipo_proveedor set desc_tipo_prov='$this->asdesc_tipo_prov' where (idtipo_proveedor='$this->aiidtipo_proveedor')";
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
			}
			
		public function feliminar()
		{
				$lbhecho=false;
				$lssql="update tipo_proveedor set estatus_tippro='0' where (idtipo_proveedor='$this->aiidtipo_proveedor')";
				$this->fconectar();
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
		}
			
	public function factivar()
		{
			$lbhecho=false;
			$lssql="update tipo_proveedor set estatus_tippro='1' where (idtipo_proveedor='$this->aiidtipo_proveedor')";
			$this->fconectar();
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
					
	
		public function flistar()
			{
				$lamatriz=array();
				$lii=0;
				$lssql="select * from tipo_proveedor order by idtipo_proveedor";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
					$lamatriz[$lii][0]=$larow["idtipo_proveedor"];
					$lamatriz[$lii][1]=$larow["desc_tipo_prov"];
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
				$lssql="select * from tipo_proveedor where estatus_tippro='1' order by idtipo_proveedor";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
					$lamatriz[$lii][0]=$larow["idtipo_proveedor"];
					$lamatriz[$lii][1]=$larow["desc_tipo_prov"];
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
				$lssql="select * from tipo_proveedor where estatus_tippro='0' order by idtipo_proveedor";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
					$lamatriz[$lii][0]=$larow["idtipo_proveedor"];
					$lamatriz[$lii][1]=$larow["desc_tipo_prov"];
					$lii++;
				}
				$this->fcierrafiltro($lrtb);
				$this->fdesconectar();
				return $lamatriz;
			}

		public function fnuevo()
			{
				$lssql="select max(idtipo_proveedor) as mayor from tipo_proveedor";
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
    public function flistadotipo_proveedor($parametro1,$parametro2){
		  $this->fconectar();
		  if($parametro1!="")//por codigo
			$sql      = "SELECT * FROM tipo_proveedor  WHERE (idtipo_proveedor='$parametro1' )";
			
		  if($parametro2!="")//por nombre
			$sql      =  "SELECT * FROM tipo_proveedor  WHERE (desc_tipo_prov='$parametro2' )";
		 
		  $cursor=$this->ffiltro($sql);
		  $contador = 0;
		  $encontrado=false;
		  
		 if ($laRow=$this->fproximo($cursor)){
				DO
				{
				   $filas [$contador][1] = $laRow["idtipo_proveedor"];
				   $filas [$contador][2] = $laRow["desc_tipo_prov"];	
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
