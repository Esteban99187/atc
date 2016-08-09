<?php

    require_once("class_db.php");
	class class_unidad_medida extends class_db
	{
			private $aiidunidad_medida;
			private $asdesc_unid_medi;
			
		public function __construct()
		{
			$this->aiidunidad_medida=0;
			$this->asdesc_unid_medi="";
		}
			
		public function __destruct()
		{
				
		}
			
		public function fsetiidunidad_medida($piidunidad_medida)
		{
				$this->aiidunidad_medida=$piidunidad_medida;
		}
			
		public function fsetsdesc_unid_medi($psdesc_unid_medi)
		{
				$this->asdesc_unid_medi=$psdesc_unid_medi;
			
		}
			
		public function fgetiidunidad_medida()
		{
				return $this->aiidunidad_medida;
		}
			
		public function fgetsdesc_unid_medi()
		{
				return $this->asdesc_unid_medi;
		}
			
		public function fbuscar()
		{
				$lbenc=false;
				$lssql="select * from unidad_medida where (idunidad_medida='$this->aiidunidad_medida')";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				if($larow=$this->fproximo($lrtb))
				{
					
					$this->aiidunidad_medida=$larow["idunidad_medida"];
					$this->asdesc_unid_medi=$larow["desc_unid_medi"];
					$lbenc=true;
					
				}
				$this->fcierrafiltro($lrtb);
				$this->fdesconectar();
				return $lbenc;
		}
		public function fverificarexistencia()
		{
			$lbenc=false;
			$lssql="select * from unidad_medida where (desc_unid_medi='$this->asdesc_unid_medi')";
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
				$lssql="insert into unidad_medida (idunidad_medida,desc_unid_medi)values('$this->aiidunidad_medida','$this->asdesc_unid_medi')";
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
			}
			
		public function fmodificar()
			{
				$lbhecho=false;
				$this->fconectar();
				$lssql="update unidad_medida set desc_unid_medi='$this->asdesc_unid_medi' where (idunidad_medida='$this->aiidunidad_medida')";
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
			}
			
		public function feliminar()
		{
				$lbhecho=false;
				$lssql="update unidad_medida set estatus_unimed='0' where (idunidad_medida='$this->aiidunidad_medida')";
				$this->fconectar();
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
		}
			public function factivar()
		{
			$lbhecho=false;
			$lssql="update unidad_medida set estatus_unimed='1' where (idunidad_medida='$this->aiidunidad_medida')";
			$this->fconectar();
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		public function flistar()
			{
				$lamatriz=array();
				$lii=0;
				$lssql="select * from unidad_medida order by idunidad_medida";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
					$lamatriz[$lii][0]=$larow["idunidad_medida"];
					$lamatriz[$lii][1]=$larow["desc_unid_medi"];
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
				$lssql="select * from unidad_medida where estatus_unimed='1' order by idunidad_medida";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
					$lamatriz[$lii][0]=$larow["idunidad_medida"];
					$lamatriz[$lii][1]=$larow["desc_unid_medi"];
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
				$lssql="select * from unidad_medida where estatus_unimed='0' order by idunidad_medida";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
					$lamatriz[$lii][0]=$larow["idunidad_medida"];
					$lamatriz[$lii][1]=$larow["desc_unid_medi"];
					$lii++;
				}
				$this->fcierrafiltro($lrtb);
				$this->fdesconectar();
				return $lamatriz;
			}
		public function fnuevo()
			{
				$lssql="select max(idunidad_medida) as mayor from unidad_medida";
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
			public function flistadounidad_medida($parametro1,$parametro2){
		  $this->fconectar();
		  if($parametro1!="")//por codigo
			$sql      = "SELECT * FROM unidad_medida  WHERE (idunidad_medida='$parametro1' )";
			
		  if($parametro2!="")//por nombre
			$sql      =  "SELECT * FROM unidad_medida  WHERE (desc_unid_medi='$parametro2' )";
		 
		  $cursor=$this->ffiltro($sql);
		  $contador = 0;
		  $encontrado=false;
		  
		 if ($laRow=$this->fproximo($cursor)){
				DO
				{
				   $filas [$contador][1] = $laRow["idunidad_medida"];
				   $filas [$contador][2] = $laRow["desc_unid_medi"];	
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
