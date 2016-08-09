<?php

    require_once("class_db.php");
	class class_estatus extends class_db
	{
			private $aiidestatus;
			private $asnombre_est;
			
		public function __construct()
		{
			$this->aiidestatus=0;
			$this->asnombre_est="";
		}
			
		public function __destruct()
		{
				
		}
			
		public function fsetiidestatus($piidestatus)
		{
				$this->aiidestatus=$piidestatus;
		}
			
		public function fsetsnombre_est($psnombre_est)
		{
				$this->asnombre_est=$psnombre_est;
			
		}
			
		public function fgetiidestatus()
		{
				return $this->aiidestatus;
		}
			
		public function fgetsnombre_est()
		{
				return $this->asnombre_est;
		}
			
		public function fbuscar()
		{
				$lbenc=false;
				$lssql="select * from estatus where (idestatus='$this->aiidestatus')";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				if($larow=$this->fproximo($lrtb))
				{
					
					$this->aiidestatus=$larow["idestatus"];
					$this->asnombre_est=$larow["nombre_est"];
					$lbenc=true;
					
				}
				$this->fcierrafiltro($lrtb);
				$this->fdesconectar();
				return $lbenc;
		}
		public function fverificarexistencia()
		{
			$lbenc=false;
			$lssql="select * from estatus where (nombre_est='$this->asnombre_est')";
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
				$lssql="insert into estatus (nombre_est)values('$this->asnombre_est')";
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
			}
			
		public function fmodificar()
			{
				$lbhecho=false;
				$this->fconectar();
				$lssql="update estatus set nombre_est='$this->asnombre_est' where (idestatus='$this->aiidestatus')";
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
			}
			
		public function feliminar()
		{
				$lbhecho=false;
				$lssql="update estatus set estatus_est='0' where (idestatus='$this->aiidestatus')";
				$this->fconectar();
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
		}
		
		public function factivar()
		{
			$lbhecho=false;
			$lssql="update estatus set estatus_est='1' where (idestatus='$this->aiidestatus')";
			$this->fconectar();
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		
		public function flistar()
			{
				$lamatriz=array();
				$lii=0;
				$lssql="select * from estatus order by idestatus";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
					$lamatriz[$lii][0]=$larow["idestatus"];
					$lamatriz[$lii][1]=$larow["nombre_est"];
					$lii++;
				}
				$this->fcierrafiltro($lrtb);
				$this->fdesconectar();
				return $lamatriz;
			}
			
		public function flistaractivos()
			{
				$lamatriz=array();
				$lii=0;
				$lssql="select * from estatus where estatus_est='1' order by idestatus";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
					$lamatriz[$lii][0]=$larow["idestatus"];
					$lamatriz[$lii][1]=$larow["nombre_est"];
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
				$lssql="select * from estatus where estatus_est='0' order by idestatus";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
					$lamatriz[$lii][0]=$larow["idestatus"];
					$lamatriz[$lii][1]=$larow["nombre_est"];
					$lii++;
				}
				$this->fcierrafiltro($lrtb);
				$this->fdesconectar();
				return $lamatriz;
			}
			
		public function fnuevo()
			{
				$lssql="select max(idestatus) as mayor from estatus";
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
     public function flistadoestatus($parametro1,$parametro2){
		  $this->fconectar();
		  if($parametro1!="")//por codigo
			$sql      = "SELECT * FROM estatus  WHERE (idestatus='$parametro1' )";
			
		  if($parametro2!="")//por nombre
			$sql      =  "SELECT * FROM estatus WHERE (nombre_est='$parametro2' )";
		 
		  $cursor=$this->ffiltro($sql);
		  $contador = 0;
		  $encontrado=false;
		  
		 if ($laRow=$this->fproximo($cursor)){
				DO
				{
				   $filas [$contador][1] = $laRow["idestatus"];
				   $filas [$contador][2] = $laRow["nombre_est"];	
				   
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
