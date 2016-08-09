<?php

    require_once("class_db.php");
	class class_roles extends class_db
	{
			private $aicod_rol;
			private $asnombre_rol;
			
		public function __construct()
		{
			$this->aicod_rol=0;
			$this->asnombre_rol="";
		}
			
		public function __destruct()
		{
				
		}
			
		public function fseticod_rol($picod_rol)
		{
				$this->aicod_rol=$picod_rol;
		}
			
		public function fsetsnombre_rol($psnombre_rol)
		{
				$this->asnombre_rol=$psnombre_rol;
			
		}
			
		public function fgeticod_rol()
		{
				return $this->aicod_rol;
		}
			
		public function fgetsnombre_rol()
		{
				return $this->asnombre_rol;
		}
			
		public function fbuscar()
		{
				$lbenc=false;
				$lssql="select * from rol where (cod_rol='$this->aicod_rol')";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				if($larow=$this->fproximo($lrtb))
				{
					
					$this->aicod_rol=$larow["cod_rol"];
					$this->asnombre_rol=$larow["nombre_rol"];
					$lbenc=true;
					
				}
				$this->fcierrafiltro($lrtb);
				$this->fdesconectar();
				return $lbenc;
		}
		
		public function fverificarexistencia()
		{
			$lbenc=false;
			$lssql="select * from rol where (nombre_rol='$this->asnombre_rol')";
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
				$lssql="insert into rol (nombre_rol)values('$this->asnombre_rol')";
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
			}
			
		public function fmodificar()
			{
				$lbhecho=false;
				$this->fconectar();
				$lssql="update rol set nombre_rol='$this->asnombre_rol' where (cod_rol='$this->aicod_rol')";
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
			}
			
		public function feliminar()
		{
				$lbhecho=false;
				$lssql="update rol set estatus_rol='0' where (cod_rol='$this->aicod_rol')";
				$this->fconectar();
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
		}
		
		public function factivar()
		{
			$lbhecho=false;
			$lssql="update rol set estatus_rol='1' where (cod_rol='$this->aicod_rol')";
			$this->fconectar();
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
			
		public function flistar()
			{
				$lamatriz=array();
				$lii=0;
				$lssql="select * from rol order by cod_rol";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
					$lamatriz[$lii][0]=$larow["cod_rol"];
					$lamatriz[$lii][1]=$larow["nombre_rol"];
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
				$lssql="select * from rol where estatus_rol='1' order by cod_rol";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
					$lamatriz[$lii][0]=$larow["cod_rol"];
					$lamatriz[$lii][1]=$larow["nombre_rol"];
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
				$lssql="select * from rol where estatus_rol='0' order by cod_rol";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
					$lamatriz[$lii][0]=$larow["cod_rol"];
					$lamatriz[$lii][1]=$larow["nombre_rol"];
					$lii++;
				}
				$this->fcierrafiltro($lrtb);
				$this->fdesconectar();
				return $lamatriz;
			}
			
			
		public function fnuevo()
			{
				$lssql="select max(cod_rol) as mayor from rol";
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
			
			public function flistadorol($parametro1,$parametro2){
		  $this->fconectar();
		  if($parametro1!="")//por codigo
			$sql      = "SELECT * FROM rol  WHERE (cod_rol='$parametro1' )";
			
		  if($parametro2!="")//por nombre
			$sql      =  "SELECT * FROM rol  WHERE (nombre_rol='$parametro2' )";
		 
		  $cursor=$this->ffiltro($sql);
		  $contador = 0;
		  $encontrado=false;
		  
		 if ($laRow=$this->fproximo($cursor)){
				DO
				{
				   $filas [$contador][1] = $laRow["cod_rol"];
				   $filas [$contador][2] = $laRow["nombre_rol"];	
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
