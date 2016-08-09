<?php

    require_once("class_db.php");
	class class_region extends class_db
	{
			private $aiidregion;
			private $asdesc_regi;
			
		public function __construct()
		{
			$this->aiidregion=0;
			$this->asdesc_regi="";
		}
			
		public function __destruct()
		{
				
		}
			
		public function fsetiidregion($piidregion)
		{
				$this->aiidregion=$piidregion;
		}
			
		public function fsetsdesc_regi($psdesc_regi)
		{
				$this->asdesc_regi=$psdesc_regi;
			
		}
			
		public function fgetiidregion()
		{
				return $this->aiidregion;
		}
			
		public function fgetsdesc_regi()
		{
				return $this->asdesc_regi;
		}
			
		public function fbuscar()
		{
				$lbenc=false;
				$lssql="select * from region where (idregion='$this->aiidregion')";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				if($larow=$this->fproximo($lrtb))
				{
					
					$this->aiidregion=$larow["idregion"];
					$this->asdesc_regi=$larow["desc_regi"];
					$lbenc=true;
					
				}
				$this->fcierrafiltro($lrtb);
				$this->fdesconectar();
				return $lbenc;
		}
		public function fverificarexistencia()
		{
			$lbenc=false;
			$lssql="select * from region where (desc_regi='$this->asdesc_regi')";
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
				$lssql="insert into region (desc_regi)values('$this->asdesc_regi')";
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
			}
			
		public function fmodificar()
			{
				$lbhecho=false;
				$this->fconectar();
				$lssql="update region set desc_regi='$this->asdesc_regi' where (idregion='$this->aiidregion')";
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
			}
			
		public function feliminar()
		{
				$lbhecho=false;
				$lssql="update region set estatus_reg='0' where (idregion='$this->aiidregion')";
				$this->fconectar();
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
		}
		public function factivar()
		{
			$lbhecho=false;
			$lssql="update region set estatus_reg='1' where (idregion='$this->aiidregion')";
			$this->fconectar();
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
			
		public function flistar()
			{
				$lamatriz=array();
				$lii=0;
				$lssql="select * from region order by idregion";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
					$lamatriz[$lii][0]=$larow["idregion"];
					$lamatriz[$lii][1]=$larow["desc_regi"];
					$lii++;
				}
				$this->fcierrafiltro($lrtb);
				$this->fdesconectar();
				return $lamatriz;
			}
			
		public function fnuevo()
			{
				$lssql="select max(idregion) as mayor from region";
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
   public function flistadoregion($parametro1,$parametro2){
		  $this->fconectar();
		  if($parametro1!="")//por codigo
			$sql      = "SELECT * FROM region  WHERE (idregion='$parametro1' )";
			
		  if($parametro2!="")//por nombre
			$sql      =  "SELECT * FROM region  WHERE (desc_regi='$parametro2' )";
		 
		  $cursor=$this->ffiltro($sql);
		  $contador = 0;
		  $encontrado=false;
		  
		 if ($laRow=$this->fproximo($cursor)){
				DO
				{
				   $filas [$contador][1] = $laRow["idregion"];
				   $filas [$contador][2] = $laRow["desc_regi"];	
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
				$lssql="select * from region where estatus_reg='1' order by idregion";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
					$lamatriz[$lii][0]=$larow["idregion"];
					$lamatriz[$lii][1]=$larow["desc_regi"];
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
				$lssql="select * from region where estatus_reg='0' order by idregion";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
					$lamatriz[$lii][0]=$larow["idregion"];
					$lamatriz[$lii][1]=$larow["desc_regi"];
					$lii++;
				}
				$this->fcierrafiltro($lrtb);
				$this->fdesconectar();
				return $lamatriz;
			}	
			
    }
    
?>
